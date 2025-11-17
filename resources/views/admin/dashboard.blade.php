@extends('admin.layouts.app')

@section('content')
<div class="luxury-dashboard">
    <!-- Header Section -->
    <div class="luxury-header">
        <h3>Dashboard Admin</h3>
        <p>Unab Shop - Panel de Control y Estadísticas</p>
    </div>

    <!-- Stats Cards Row -->
    <div class="row">
        <!-- Today's Money Card -->
        <div class="col-xl-3 col-sm-6">
            <div class="luxury-stat-card">
                <div class="stat-card-body">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Today's Money</p>
                            <h4 class="stat-value">$53k</h4>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="material-symbols-rounded">payments</i>
                        </div>
                    </div>
                    <div class="stat-card-footer">
                        <p class="stat-trend">
                            <span class="stat-trend-value positive">+55%</span>
                            que la semana pasada
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Users Card -->
        <div class="col-xl-3 col-sm-6">
            <div class="luxury-stat-card">
                <div class="stat-card-body">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Today's Users</p>
                            <h4 class="stat-value">2,300</h4>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="material-symbols-rounded">group</i>
                        </div>
                    </div>
                    <div class="stat-card-footer">
                        <p class="stat-trend">
                            <span class="stat-trend-value positive">+3%</span>
                            que el mes pasado
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ads Views Card -->
        <div class="col-xl-3 col-sm-6">
            <div class="luxury-stat-card">
                <div class="stat-card-body">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Ads Views</p>
                            <h4 class="stat-value">3,462</h4>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="material-symbols-rounded">trending_up</i>
                        </div>
                    </div>
                    <div class="stat-card-footer">
                        <p class="stat-trend">
                            <span class="stat-trend-value negative">-2%</span>
                            que ayer
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Card -->
        <div class="col-xl-3 col-sm-6">
            <div class="luxury-stat-card">
                <div class="stat-card-body">
                    <div class="stat-card-header">
                        <div>
                            <p class="stat-label">Sales</p>
                            <h4 class="stat-value">$103,430</h4>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="material-symbols-rounded">shopping_cart</i>
                        </div>
                    </div>
                    <div class="stat-card-footer">
                        <p class="stat-trend">
                            <span class="stat-trend-value positive">+5%</span>
                            que ayer
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection