@extends('admin.layouts.master')

@section('content')
<div class="space-y-8">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-2xl p-8 text-white ios-shadow hover-lift relative overflow-hidden">
        <div class="absolute inset-0 bg-white/5 backdrop-blur-3xl"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform translate-x-32 -translate-y-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full blur-2xl transform -translate-x-24 translate-y-24"></div>
        
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome back, Admin! 👋</h1>
                    <p class="text-blue-100 text-lg">Here's what's happening with your platform today.</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-6">
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
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Users Card -->
        <div class="group bg-white/90 glass-effect p-6 rounded-2xl ios-shadow hover-lift cursor-pointer border border-white/20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-indigo-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-200/20 to-cyan-200/20 rounded-full blur-2xl transform translate-x-16 -translate-y-16"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center ios-shadow group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        {{--<div class="text-2xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">{{ $totalSiswa }}</div>--}}
                        {{-- <div class="text-sm text-gray-500">+{{ $todayRegistrations }} today</div>--}}
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-gray-700 mb-1">Total Users 👨‍🎓</h3>
                    <p class="text-sm text-gray-500">Active learning community</p>
                </div>
                
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Active</span>
                    </div>
                    {{--<div class="text-xs text-green-600 font-medium"> {{ $weeklyGrowth >= 0 ? '↗' : '↘' }} {{ $weeklyGrowth >= 0 ? '+' : '' }}{{ $weeklyGrowth }}%</div>--}}
                </div>
            </div>
        </div>
        
        <!-- Total Pengajar Card -->
        <div class="group bg-white/90 glass-effect p-6 rounded-2xl ios-shadow hover-lift cursor-pointer border border-white/20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 to-teal-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-200/20 to-teal-200/20 rounded-full blur-2xl transform translate-x-16 -translate-y-16"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center ios-shadow group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800 group-hover:text-emerald-600 transition-colors duration-300">{{ $totalPengajar }}</div>
                        <div class="text-sm text-gray-500">+3 this month</div>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-gray-700 mb-1">Total Pengajar 👨‍🏫</h3>
                    <p class="text-sm text-gray-500">Expert instructors</p>
                </div>
                
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Available</span>
                    </div>
                    <div class="text-xs text-emerald-600 font-medium">↗ +7.1%</div>
                </div>
            </div>
        </div>
        
        <!-- Total Kelas Card -->
        <div class="group bg-white/90 glass-effect p-6 rounded-2xl ios-shadow hover-lift cursor-pointer border border-white/20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-50/50 to-pink-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-200/20 to-pink-200/20 rounded-full blur-2xl transform translate-x-16 -translate-y-16"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center ios-shadow group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-800 group-hover:text-purple-600 transition-colors duration-300">{{ $totalMateri }}</div>
                        <div class="text-sm text-gray-500">+2 this month</div>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-gray-700 mb-1">Total Kelas 📚</h3>
                    <p class="text-sm text-gray-500">Available courses</p>
                </div>
                
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Running</span>
                    </div>
                    <div class="text-xs text-purple-600 font-medium">↗ +25.0%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activity -->
        <div class="bg-white/90 glass-effect p-6 rounded-2xl ios-shadow border border-white/20 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-200/20 to-purple-200/20 rounded-full blur-2xl transform translate-x-12 -translate-y-12"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center ios-shadow">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="space-y-4">
                     @forelse($recentActivities as $activity)
                    <div class="flex items-center space-x-3 p-3 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 hover-lift cursor-pointer">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-700">{{ $activity['message'] ?? $activity }}</p>
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
                </div>
        
        <!-- Quick Actions -->
        <div class="bg-white/90 glass-effect p-6 rounded-2xl ios-shadow border border-white/20 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-orange-200/20 to-red-200/20 rounded-full blur-2xl transform translate-x-12 -translate-y-12"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                    <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center ios-shadow">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                        </svg>
                    </div>
                </div>
                
                <a href="{{ route('admin.user.create') }}"></a>
                <div class="grid grid-cols-2 gap-3">
                    <button class="group p-4 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 border border-blue-100/50 hover-lift transition-all duration-300">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300 ios-shadow">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-gray-700">Add User</p>
                    </button>
                    <button class="group p-4 rounded-xl bg-gradient-to-r from-yellow-50 to-orange-50 hover:from-yellow-100 hover:to-orange-100 border border-yellow-100/50 hover-lift transition-all duration-300">
                        <div class="w-8 h-8 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300 ios-shadow">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-medium text-gray-700">Issue Certificate</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection