 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('admin.dashboard') }}" class="brand-link">
         <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
     </a>
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="info">
             <p href="#" class="d-block text-white" style="margin-right: 25px; ">
                 {{ auth()->guard('admin')->user()->name }}</p>
             <p href="#" class="d-block text-white" style="margin-right: 25px; ">
                 {{ auth()->guard('admin')->user()->email }}</p>
         </div>
     </div>
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             المسئولين
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.admins') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المسئولين</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="{{ route('admin.register') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>إضافة مسئول</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             المواد
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.courses') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>كل المواد</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.courses', App\Enums\CourseStatus::ACCEPTED->value) }}"
                                 class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المواد المقبولة</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.courses', App\Enums\CourseStatus::PENDING->value) }}"
                                 class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المواد المعلقة</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.courses', App\Enums\CourseStatus::REJECTED->value) }}"
                                 class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المواد المرفوضة</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('admin.users') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             المستخدمين
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.payments.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             عمليات الدفع
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.profile') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             تحديث البيانات
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.settings.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             إعدادات الموقع
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('admin.currencies.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             العملات
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.departments.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             الأقسام
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <form action="{{ route('admin.logout') }}" class="bg-transparent" method="post">
                         @csrf
                         <button type="submit" class="nav-link bg-blue w-100 text-left">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 تسجيل الخروج
                             </p>
                         </button>
                     </form>
                 </li>
                 
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
