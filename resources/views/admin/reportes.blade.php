@extends('layouts.app')

@section('title', 'Reportes')

@push('styles')
<style>
    .layout-admin {
        display: flex;
        min-height: calc(100vh - 62px);
    }

    /* ── Sidebar ───────────────────────────── */
    .sidebar {
        width: 220px;
        background: #7a9e7e;
        padding: 20px 12px;
        flex-shrink: 0;
        position: sticky;
        top: 62px;
        height: calc(100vh - 62px);
        overflow-y: auto;
    }

    .sidebar-brand {
        padding: 8px 10px 16px;
        border-bottom: 1px solid rgba(255,255,255,.15);
        margin-bottom: 12px;
    }

    .sidebar-brand span {
        font-size: 11px;
        font-weight: 700;
        color: rgba(255,255,255,.8);
        text-transform: uppercase;
        letter-spacing: .08em;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 10px;
        color: rgba(255,255,255,.9);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
        margin-bottom: 4px;
    }

    .sidebar-link:hover {
        background: rgba(255,255,255,.15);
    }

    .sidebar-link.active {
        background: #f2e5da;
        color: #5f7d63;
    }

    .sidebar-link i {
        width: 16px;
        text-align: center;
    }

    /* ── Main ─────────────────────────────── */
    .main {
        flex: 1;
        padding: 28px 32px;
        overflow-x: auto;
        background: #f2e5da;
    }

    .page-title {
        font-size: 24px;
        font-weight: 800;
        color: #5f7d63;
        margin-bottom: 4px;
    }

    .page-sub {
        font-size: 13px;
        color: #7c8a7d;
        margin-bottom: 24px;
    }

    /* ── Filtros ───────────────────────────── */
    .filter-card {
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0,0,0,.05);
        padding: 20px;
        margin-bottom: 24px;
    }

    .filter-card h3 {
        font-size: 13px;
        font-weight: 700;
        color: #7c8a7d;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .filter-row {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        align-items: flex-end;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .filter-group label {
        font-size: 12px;
        font-weight: 700;
        color: #4b5c4e;
    }

    .filter-group input {
        padding: 10px 12px;
        border: 1px solid #dfe9dc;
        border-radius: 10px;
        font-size: 13px;
        font-family: 'Nunito', sans-serif;
        outline: none;
    }

    .filter-group input:focus {
        border-color: #7a9e7e;
    }

    .btn-filter {
        padding: 10px 18px;
        background: #7a9e7e;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-filter:hover {
        background: #5f7d63;
    }

    .btn-reset {
        padding: 10px 14px;
        background: white;
        color: #7c8a7d;
        border: 1px solid #dfe9dc;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .btn-reset:hover {
        background: #faf6f1;
    }

    /* ── KPI ─────────────────────────────── */
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .kpi-card {
        border-radius: 18px;
        padding: 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        color: white;
        box-shadow: 0 8px 20px rgba(0,0,0,.05);
    }

    .kpi-card.azul,
    .kpi-card.verde,
    .kpi-card.naranja {
        background: #7a9e7e;
    }

    .kpi-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: rgba(255,255,255,.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
    }

    .kpi-info .value {
        font-size: 24px;
        font-weight: 800;
    }

    .kpi-info .label {
        font-size: 12px;
        color: rgba(255,255,255,.8);
    }

    /* ── Reportes ─────────────────────────── */
    .reports-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 24px;
    }

    .report-card {
        background: white;
        border-radius: 18px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 8px 20px rgba(0,0,0,.05);
    }

    .report-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dfe9dc;
        color: #5f7d63;
        font-size: 18px;
    }

    .report-info {
        flex: 1;
    }

    .report-title {
        font-size: 14px;
        font-weight: 700;
        color: #4b5c4e;
    }

    .report-sub,
    .report-date {
        font-size: 12px;
        color: #7c8a7d;
        margin-top: 3px;
    }

    /* ── Tabla ────────────────────────────── */
    .card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,.05);
    }

    .card-head {
        padding: 18px 22px;
        border-bottom: 1px solid #ece7e2;
    }

    .card-head h2 {
        color: #5f7d63;
        font-size: 16px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #faf6f1;
        color: #7c8a7d;
        font-size: 11px;
        text-transform: uppercase;
        padding: 12px 16px;
    }

    td {
        padding: 14px 16px;
        color: #4b5c4e;
        border-bottom: 1px solid #f0ece7;
    }

    tr:hover td {
        background: #faf6f1;
    }

    /* ── Badges ───────────────────────────── */
    .badge {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .badge-entregado {
        background: #dff4df;
        color: #2f6d3d;
    }

    .badge-procesando {
        background: #fff1d6;
        color: #a06b00;
    }

    .empty-row td {
        text-align: center;
        padding: 40px;
        color: #7c8a7d;
    }

    /* ── Gráfica ──────────────────────────── */
    .chart-wrap {
        padding: 20px;
    }

    .chart-bar-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .chart-label {
        width: 60px;
        font-size: 12px;
        color: #7c8a7d;
    }

    .chart-bar-bg {
        flex: 1;
        background: #ece7e2;
        border-radius: 8px;
        height: 22px;
        overflow: hidden;
    }

    .chart-bar {
        height: 100%;
        background: #7a9e7e;
        display: flex;
        align-items: center;
        padding-left: 8px;
    }

    .chart-bar span {
        color: white;
        font-size: 11px;
        font-weight: 700;
    }

    .chart-val {
        width: 80px;
        text-align: right;
        font-size: 12px;
        font-weight: 700;
        color: #5f7d63;
    }

    @media (max-width: 860px) {
        .kpi-grid,
        .reports-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="layout-admin">

    <aside class="sidebar">
        <div class="sidebar-brand"><span>Panel Admin</span></div>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link"><i class="fas fa-chart-pie"></i> Dashboard</a>
        <a href="{{ route('admin.productos.index') }}" class="sidebar-link"><i class="fas fa-boxes"></i> Gestión de Productos</a>
        <a href="{{ route('admin.reportes') }}" class="sidebar-link active"><i class="fas fa-file-alt"></i> Reportes</a>
    </aside>

    <main class="main">
        <div class="page-title">Reportes</div>
        <div class="page-sub">Consulta y descarga reportes del sistema</div>

        {{-- Filtros de fecha --}}
        <div class="filter-card">
            <h3>Filtros de Fecha</h3>
            <form method="GET" action="{{ route('admin.reportes') }}">
                <div class="filter-row">
                    <div class="filter-group">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                    </div>
                    <div class="filter-group">
                        <label>Fecha Fin</label>
                        <input type="date" name="fecha_fin" value="{{ request('fecha_fin') }}">
                    </div>
                    <button type="submit" class="btn-filter"><i class="fas fa-filter"></i> Aplicar Filtros</button>
                    <a href="{{ route('admin.reportes') }}" class="btn-reset"><i class="fas fa-xmark"></i> Limpiar</a>
                </div>
            </form>
        </div>

        {{-- KPIs de resumen --}}
        <div class="kpi-grid">
            <div class="kpi-card azul">
                <div class="kpi-icon"><i class="fas fa-dollar-sign"></i></div>
                <div class="kpi-info">
                    <div class="value">${{ number_format($totalVentas, 2) }}</div>
                    <div class="label">Ventas Totales (mes)</div>
                </div>
            </div>
            <div class="kpi-card verde">
                <div class="kpi-icon"><i class="fas fa-shopping-bag"></i></div>
                <div class="kpi-info">
                    <div class="value">{{ $totalProductos }}</div>
                    <div class="label">Productos Vendidos</div>
                </div>
            </div>
            <div class="kpi-card naranja">
                <div class="kpi-icon"><i class="fas fa-arrow-trend-up"></i></div>
                <div class="kpi-info">
                    <div class="value">{{ $crecimiento }}</div>
                    <div class="label">Crecimiento</div>
                </div>
            </div>
        </div>

        {{-- Gráfica de ventas por mes --}}
        @if($ventasPorMes->isNotEmpty())
        <div class="card" style="margin-bottom:24px">
            <div class="card-head">
                <h2>Ventas Mensuales</h2>
            </div>
            <div class="chart-wrap">
                @php $maxVenta = $ventasPorMes->max() ?: 1; @endphp
                @foreach($ventasPorMes as $mes => $total)
                    <div class="chart-bar-row">
                        <span class="chart-label">{{ \Carbon\Carbon::parse($mes . '-01')->format('M Y') }}</span>
                        <div class="chart-bar-bg">
                            <div class="chart-bar" style="width:{{ min(100, ($total / $maxVenta) * 100) }}%">
                                <span>${{ number_format($total, 0) }}</span>
                            </div>
                        </div>
                        <span class="chart-val">${{ number_format($total, 2) }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Reportes disponibles --}}
        <div class="reports-grid" style="margin-bottom:24px">
            <div class="report-card">
                <div class="report-icon azul"><i class="fas fa-chart-line"></i></div>
                <div class="report-info">
                    <div class="report-title">Reporte de Ventas Mensual</div>
                    <div class="report-sub">Ventas totales y desglose por categoría del último mes</div>
                    <div class="report-date"><i class="fas fa-calendar"></i> {{ now()->format('F Y') }}</div>
                </div>
            </div>
            <div class="report-card">
                <div class="report-icon verde"><i class="fas fa-warehouse"></i></div>
                <div class="report-info">
                    <div class="report-title">Reporte de Inventario</div>
                    <div class="report-sub">Estado actual del inventario y productos con bajo stock</div>
                    <div class="report-date"><i class="fas fa-calendar"></i> Actualizado hoy</div>
                </div>
            </div>
            <div class="report-card">
                <div class="report-icon naranja"><i class="fas fa-star"></i></div>
                <div class="report-info">
                    <div class="report-title">Reporte de Productos Más Vendidos</div>
                    <div class="report-sub">Top 20 productos con mayor volumen de ventas</div>
                    <div class="report-date"><i class="fas fa-calendar"></i> Última semana</div>
                </div>
            </div>
            <div class="report-card">
                <div class="report-icon azul"><i class="fas fa-users"></i></div>
                <div class="report-info">
                    <div class="report-title">Reporte de Clientes</div>
                    <div class="report-sub">Clientes registrados y su historial de compras</div>
                    <div class="report-date"><i class="fas fa-calendar"></i> {{ now()->format('d/m/Y') }}</div>
                </div>
            </div>
        </div>

        {{-- Historial de ventas --}}
        <div class="card">
            <div class="card-head">
                <h2>Historial de Ventas</h2>
                <span style="font-size:13px;color:var(--texto-sub)">{{ $ventas->count() }} registros</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Productos</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ventas as $venta)
                        @php
                            $dias = $venta->created_at->diffInDays(now());
                            $estado = $dias >= 7 ? 'Entregado' : 'Procesando';
                            $badgeClass = $dias >= 7 ? 'badge-entregado' : 'badge-procesando';
                        @endphp
                        <tr>
                            <td><strong>#ORD-{{ str_pad($venta->id, 3, '0', STR_PAD_LEFT) }}</strong></td>
                            <td>{{ $venta->user->name ?? 'N/A' }}</td>
                            <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $venta->detalleVentas->count() }} artículo(s)</td>
                            <td><strong>${{ number_format($venta->total, 2) }}</strong></td>
                            <td><span class="badge {{ $badgeClass }}">{{ $estado }}</span></td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="6">
                                <i class="fas fa-chart-bar" style="font-size:32px;color:#cbd5e0;display:block;margin-bottom:8px"></i>
                                No hay ventas registradas en este período
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>
</div>
@endsection
