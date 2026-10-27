@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
        <p class="text-gray-600 mt-2">Manage job postings, users, and system</p>
    </div>

    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-lg p-6 text-white mb-8">
        <h2 class="text-2xl font-bold mb-2">Welcome, {{ auth()->user()->name }}! 👋</h2>
        <p class="opacity-90">You have admin access. Manage the system below.</p>
        <p class="text-sm opacity-75 mt-2">Role: <span class="font-mono bg-blue-900 px-2 py-1 rounded">{{ auth()->user()->role }}</span></p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Jobs -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Job Postings</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">
                        {{ App\Models\Job::count() }}
                    </p>
                </div>
                <div class="text-blue-500 text-3xl">📋</div>
            </div>
        </div>

        <!-- Active Jobs -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Active Jobs</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">
                        {{ App\Models\Job::where('status', 'aktif')->count() }}
                    </p>
                </div>
                <div class="text-green-500 text-3xl">✅</div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">
                        {{ App\Models\User::count() }}
                    </p>
                </div>
                <div class="text-purple-500 text-3xl">👥</div>
            </div>
        </div>

        <!-- Admins -->
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Admin Users</p>
                    <p class="text-2xl font-bold text-gray-900 mt-2">
                        {{ App\Models\User::whereIn('role', ['admin', 'super_admin'])->count() }}
                    </p>
                </div>
                <div class="text-red-500 text-3xl">🔐</div>
            </div>
        </div>
    </div>

    <!-- Admin Functions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Manage Jobs -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">📝 Manage Job Postings</h3>
            <p class="text-gray-600 mb-4">Create, edit, or delete job postings.</p>
            <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                Manage Jobs
            </a>
        </div>

        <!-- Manage Users -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">👥 Manage Users</h3>
            <p class="text-gray-600 mb-4">View users, assign roles, manage permissions.</p>
            <a href="#" class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">
                Manage Users
            </a>
        </div>

        <!-- Activity Logs -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">📊 Activity Logs</h3>
            <p class="text-gray-600 mb-4">View admin activity and system logs.</p>
            <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                View Logs
            </a>
        </div>

        <!-- System Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">⚙️ System Settings</h3>
            <p class="text-gray-600 mb-4">Configure system settings and preferences.</p>
            <a href="#" class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
                Settings
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">📜 Recent Activity</h3>
        <div class="space-y-3">
            <p class="text-gray-600 text-sm">Admin dashboard system is now live! ✨</p>
            <p class="text-gray-600 text-sm">Phase 2A authentication setup complete</p>
            <p class="text-gray-600 text-sm">Google OAuth integration working perfectly</p>
        </div>
    </div>
</div>
@endsection