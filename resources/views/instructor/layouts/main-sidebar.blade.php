 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('instructor.dashboard') }}" class="brand-link">
         <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
     </a>
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="info">
             <p href="#" class="d-block text-white" style="margin-right: 25px; ">
                 {{ auth()->guard('instructor')->user()->name }}</p>
             <p href="#" class="d-block text-white" style="margin-right: 25px; ">
                 {{ auth()->guard('instructor')->user()->email }}</p>
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
                             المواد
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('instructor.courses.create') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>إضافة مادة</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('instructor.courses.status') }}" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>كل المواد</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('instructor.courses.status', App\Enums\CourseStatus::ACCEPTED->value) }}"
                                 class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المواد المقبولة</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('instructor.courses.status', App\Enums\CourseStatus::PENDING->value) }}"
                                 class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المواد المعلقة</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('instructor.courses.status', App\Enums\CourseStatus::REJECTED->value) }}"
                                 class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>المواد المرفوضة</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('instructor.profile') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             تعديل بيانات الحساب
                         </p>
                     </a>
                 </li> 
                 <li class="nav-item">
                     <a href="{{ route('instructor.comments.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                            التعليقات
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <form action="{{ route('instructor.logout') }}" class="bg-transparent" method="post">
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
