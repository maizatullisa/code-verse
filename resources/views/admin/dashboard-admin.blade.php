@extends('admin.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto space-y-8">
        <!-- Welcome Section -->
        <div class="bg-blue-600 rounded-lg p-8 text-white shadow-md">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome back, Admin! 👋</h1>
                    <p class="text-blue-100 text-lg">Here's what's happening with your platform today.</p>
                </div>
                <div class="hidden md:block"> 
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Users Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4"> 
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</div>
                        <div class="text-sm text-gray-500">+{{ $todayRegistrations }} today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Users</h3>
                    <p class="text-sm text-gray-500">Active learning community</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Active</span>
                    </div>
                    {{--<div class="text-xs text-green-600 font-medium"> {{ $weeklyGrowth >= 0 ? '↗' : '↘' }} {{ $weeklyGrowth >= 0 ? '+' : '' }}{{ $weeklyGrowth }}%</div>--}}
                </div>
            </div>
            
            <!-- Total Pengajar Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4"> 
                    <div class="text-right">
                        <div class="text-2xl font-bold">{{ $totalPengajar }}</div>
                        <div class="text-sm text-gray-500">+{{ $todayPengajarRegistrations ?? 0 }} today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Pengajar</h3>
                    <p class="text-sm text-gray-500">Expert instructors</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Available</span>
                    </div>
                    <div class="text-xs text-green-600 font-medium">{{ $pengajarWeeklyGrowth >= 0 ? '↗' : '↘' }} {{ $pengajarWeeklyGrowth >= 0 ? '+' : '' }}{{ $pengajarWeeklyGrowth }}%</div>
                </div>
            </div>
            
            <!-- Total Kelas Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalMateri }}</div>
                        <div class="text-sm text-gray-500">+{{ $todayMateriCreated ?? 0 }} today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Kelas</h3>
                    <p class="text-sm text-gray-500">Available courses</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Running</span>
                    </div>
                    <div class="text-xs text-purple-600 font-medium">{{ $materiWeeklyGrowth >= 0 ? '↗' : '↘' }} {{ $materiWeeklyGrowth >= 0 ? '+' : '' }}{{ $materiWeeklyGrowth }}%</div>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activity -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                </div>
                
                <div class="space-y-4">
                    @forelse($recentActivities as $activity)
                        <div class="flex items-center space-x-3 p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors duration-200 cursor-pointer">
                            <div class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-700 truncate">{{ $activity['message'] ?? $activity->message }}</p>
                                <p class="text-xs text-gray-500">
                                    {{ isset($activity['created_at']) ? \Carbon\Carbon::parse($activity['created_at'])->diffForHumans() : ($activity->created_at->diffForHumans() ?? $activity['time']) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center justify-center py-8">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-sm text-gray-500">No recent activity</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Quick Stats -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Quick Stats</h3>
                     
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-lg bg-green-50 border border-green-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Monthly Registrations</span>
                        </div>
                        <span class="text-lg font-bold text-green-600">{{ $monthlyRegistrations ?? 0 }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-lg bg-orange-50 border border-orange-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-orange-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Weekly Growth</span>
                        </div>
                        <span class="text-lg font-bold {{ ($weeklyGrowth ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ ($weeklyGrowth ?? 0) >= 0 ? '+' : '' }}{{ $weeklyGrowth ?? 0 }}%
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-lg bg-blue-50 border border-blue-100">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-blue-500 rounded-full flex-shrink-0"></div>
                            <span class="text-sm font-medium text-gray-700">Total User</span>
                        </div>
                        <span class="text-lg font-bold text-blue-600">{{ ($totalSiswa ?? 0) + ($totalPengajar ?? 0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection