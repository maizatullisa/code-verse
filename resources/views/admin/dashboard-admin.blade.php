@extends('admin.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 py-8 space-y-8">
        <!-- Welcome Section -->
        <div class="bg-blue-600 rounded-lg p-8 text-white shadow-md">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome back, Admin! 👋</h1>
                    <p class="text-blue-100 text-lg">Here's what's happening with your platform today.</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-16 h-16 bg-blue-500 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-2 sm:space-y-0">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-sm">System Status: All Good</span>
                </div>
                <div class="text-sm">
                    <span class="text-blue-200">Last updated:</span>
                    <span class="font-medium">Just now</span>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Users Card -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</div>
                        <div class="text-sm text-gray-500">+{{ $todayRegistrations }} today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Users 👨‍🎓</h3>
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
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalPengajar }}</div>
                        <div class="text-sm text-gray-500">+{{ $todayPengajarRegistrations ?? 0 }} today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Pengajar 👨‍🏫</h3>
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
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800">{{ $totalMateri }}</div>
                        <div class="text-sm text-gray-500">+{{ $todayMateriCreated ?? 0 }} today</div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h3 class="font-semibold text-gray-700 mb-1">Total Kelas 📚</h3>
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
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="space-y-4">
                    @forelse($recentActivities as $activity)
                    <div class="flex items-center space-x-3 p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors duration-200 cursor-pointer">
                        <div class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-700 truncate">{{ $activity['message'] ?? $activity }}</p>
                            <p class="text-xs text-gray-500">{{ $activity['time'] ?? 'Just now' }}</p>
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
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
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