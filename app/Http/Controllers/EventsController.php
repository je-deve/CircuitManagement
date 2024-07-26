<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Circuit;
use App\Models\ServiceProvider;
use App\Models\EntityName;
use App\Models\ReportType;
use App\Models\User;
use App\Models\CircuitStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $circuit_number = $request->input('circuit_number');
        $user_id = $request->input('user_id');
        $report_type_id = $request->input('report_type_id');
        $service_provider_id = $request->input('service_provider_id');
        $entity_name_id = $request->input('entity_name_id');

        $events = Event::query()
            ->when($search, function ($query, $search) {
                return $query->where('report_detail', 'like', "%{$search}%");
            })
            ->when($circuit_number, function ($query, $circuit_number) {
                return $query->whereHas('circuit', function ($query) use ($circuit_number) {
                    $query->where('circuit_number', 'like', "%{$circuit_number}%");
                });
            })
            ->when($user_id, function ($query, $user_id) {
                return $query->where('user_id', $user_id);
            })
            ->when($report_type_id, function ($query, $report_type_id) {
                return $query->where('report_type_id', $report_type_id);
            })
            ->when($service_provider_id, function ($query, $service_provider_id) {
                return $query->whereHas('circuit', function ($query) use ($service_provider_id) {
                    $query->where('service_provider_id', $service_provider_id);
                });
            })
            ->when($entity_name_id, function ($query, $entity_name_id) {
                return $query->whereHas('circuit', function ($query) use ($entity_name_id) {
                    $query->where('entity_name_id', $entity_name_id);
                });
            })
            ->orderBy('completion_date', 'asc') // Ensure incomplete events appear first
            ->paginate(10);

        $serviceProviders = ServiceProvider::all();
        $entityNames = EntityName::all();
        $reportTypes = ReportType::all(); // Fetch report types
        $users = User::all(); // Fetch users

        return view('events.index', compact('events', 'serviceProviders', 'entityNames', 'reportTypes', 'users'));
    }


    // عرض صفحة إضافة حدث جديد
    public function create(Request $request)
    {
        $reportTypes = ReportType::all();
        $circuit_id = $request->query('circuit_id');
        $circuit = Circuit::findOrFail($circuit_id);
        $circuitStatuses = CircuitStatus::all(); // تأكد من أن هذا يحتوي على البيانات
        $users = User::all();

        return view('events.create', [
            'reportTypes' => $reportTypes,
            'circuit_id' => $circuit->id,
            'circuit_number' => $circuit->circuit_number,
            'circuitStatuses' => $circuitStatuses, // تأكد من تمرير هذه البيانات
            'users' => $users,
        ]);
    }


    // تخزين الحدث الجديد
    public function store(Request $request)
    {
        $request->validate([
            'circuit_id' => 'required|exists:circuits,id',
            'report_date' => 'nullable|date',
            'report_type_id' => 'required|exists:report_types,id',
            'completion_date' => 'nullable|date',
            'report_detail' => 'required|string',
            'circuit_status_id' => 'required|exists:circuit_statuses,id',
        ]);

        Event::create([
            'circuit_id' => $request->circuit_id,
            'report_date' => $request->report_date ?? now(),
            'report_type_id' => $request->report_type_id,
            'completion_date' => $request->completion_date,
            'report_detail' => $request->report_detail,
            'circuit_status_id' => $request->circuit_status_id,
            'user_id' => Auth::id(),
        ]);

        // تحديث حالة الدائرة هنا إذا لزم الأمر
        $circuit = Circuit::findOrFail($request->circuit_id);
        $circuit->circuit_status_id = $request->circuit_status_id;
        $circuit->save();

        return redirect()->route('circuits.index')->with('success', 'Event added successfully.');
    }
    // app/Http/Controllers/EventsController.php

    public function complete($id)
    {
        $event = Event::findOrFail($id);

        // تحديث حالة الدائرة
        $circuit = $event->circuit;
        $circuit->circuit_status_id = 1;
        $circuit->save();

        // تسجيل تاريخ الانتهاء
        $event->completion_date = now();
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event marked as completed.');
    }


}
