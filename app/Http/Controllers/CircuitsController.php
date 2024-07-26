<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use App\Models\ServiceProvider;
use App\Models\CircuitType;
use App\Models\EntityType;
use App\Models\EntityName;
use App\Models\CircuitStatus;
use Illuminate\Http\Request;

class CircuitsController extends Controller
{

    public function index(Request $request)
    {
        $query = Circuit::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('circuit_number', 'like', "%{$search}%")
                ->orWhere('speed', 'like', "%{$search}%");
        }

        if ($request->filled('service_provider_id')) {
            $query->where('service_provider_id', $request->input('service_provider_id'));
        }

        if ($request->filled('circuit_type_id')) {
            $query->where('circuit_type_id', $request->input('circuit_type_id'));
        }

        if ($request->filled('entity_type_id')) {
            $query->where('entity_type_id', $request->input('entity_type_id'));
        }

        if ($request->filled('entity_name_id')) {
            $query->where('entity_name_id', $request->input('entity_name_id'));
        }

        if ($request->filled('circuit_status_id')) {
            $query->where('circuit_status_id', $request->input('circuit_status_id'));
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status !== 'all') {
                $query->where('circuit_status_id', $status);
            }
        }

        $circuits = $query->paginate(10);

        $totalCircuits = Circuit::count();
        $activeCircuits = Circuit::where('circuit_status_id', 1)->count();
        $inactiveCircuits = Circuit::where('circuit_status_id', 2)->count();
        $faultyCircuits = Circuit::where('circuit_status_id', 5)->count();

        $serviceProviders = ServiceProvider::all();
        $circuitTypes = CircuitType::all();
        $entityTypes = EntityType::all();
        $entityNames = EntityName::all();
        $circuitStatuses = CircuitStatus::all();

        return view('circuits.index', compact(
            'circuits',
            'serviceProviders',
            'circuitTypes',
            'entityTypes',
            'entityNames',
            'circuitStatuses',
            'totalCircuits',
            'activeCircuits',
            'inactiveCircuits',
            'faultyCircuits'
        ));
    }

    public function create()
    {
        $serviceProviders = ServiceProvider::all();
        $circuitTypes = CircuitType::all();
        $entityTypes = EntityType::all();
        $entityNames = EntityName::all();
        $circuitStatuses = CircuitStatus::all();

        return view('circuits.create', compact(
            'serviceProviders',
            'circuitTypes',
            'entityTypes',
            'entityNames',
            'circuitStatuses'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'circuit_number' => 'required|unique:circuits,circuit_number',
            'speed' => 'required',
            'service_provider_id' => 'required',
            'circuit_type_id' => 'required',
            'entity_type_id' => 'required',
            'entity_name_id' => 'required',
            'circuit_status_id' => 'required',
        ]);

        Circuit::create($request->all());

        return redirect()->route('circuits.index')->with('success', 'Circuit added successfully');
    }

    public function edit($id)
    {
        $circuit = Circuit::findOrFail($id);
        $serviceProviders = ServiceProvider::all();
        $circuitTypes = CircuitType::all();
        $entityTypes = EntityType::all();
        $entityNames = EntityName::all();
        $circuitStatuses = CircuitStatus::all();

        return view('circuits.edit', compact(
            'circuit',
            'serviceProviders',
            'circuitTypes',
            'entityTypes',
            'entityNames',
            'circuitStatuses'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'circuit_number' => 'required',
            'speed' => 'required',
            'service_provider_id' => 'required',
            'circuit_type_id' => 'required',
            'entity_type_id' => 'required',
            'entity_name_id' => 'required',
            'circuit_status_id' => 'required',
        ]);

        $circuit = Circuit::findOrFail($id);
        $circuit->update($request->all());

        return redirect()->route('circuits.index')->with('success', 'Circuit updated successfully');
    }

    public function destroy($id)
    {
        $circuit = Circuit::findOrFail($id);
        $circuit->delete();

        return redirect()->route('circuits.index')->with('success', 'Circuit deleted successfully');
    }

    public function filter(Request $request)
    {
        $query = Circuit::query();

        if ($request->has('service_provider') && $request->service_provider) {
            $query->where('service_provider_id', $request->service_provider);
        }

        if ($request->has('hospital_name') && $request->hospital_name) {
            $query->where('entity_name_id', $request->hospital_name);
        }

        $circuits = $query->get();

        return response()->json($circuits);
    }

    // عرض تفاصيل دائرة محددة
    public function show($id)
    {
        $circuit = Circuit::findOrFail($id);
        $circuitStatuses = CircuitStatus::all();

        return view('circuits.show', [
            'circuit' => $circuit,
            'circuitStatuses' => $circuitStatuses,
        ]);
    }

    // تحديث حالة دائرة محددة
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'circuit_status_id' => 'required|exists:circuit_statuses,id',
        ]);

        $circuit = Circuit::findOrFail($id);
        $circuit->circuit_status_id = $request->circuit_status_id;
        $circuit->save();

        return redirect()->route('circuits.show', $circuit->id)->with('success', 'Circuit status updated successfully.');
    }
}
