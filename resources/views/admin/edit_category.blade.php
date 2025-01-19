<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('theme/AdminTemplate/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('theme/AdminTemplate/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        
        <div class="container my-5">
            <form action="{{ route('update.category', $category->id) }}" method="POST" class="my-5">
              @csrf
              @method('PUT')
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('category_name') is-invalid @enderror" 
                        id="categoryName" 
                        name="category_name" 
                        placeholder="Enter category name"
                        value="{{ old('category_name', $category->category_name) }}">
                </div>
                @error('category_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Category</button>
                    <a href="{{ route('view.category') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
            @if (session('message'))
              <div class="alert 
              @if (session('message.type') === 'success')
                alert-success
              @elseif(session('message.type') === 'error')
                alert-danger
              @endif"
              role="alert">
                {{ session('message.text') }}
              </div>
            @endif
        </div>
    

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('theme/AdminTemplate/assets/vendors/js/vendor.bundle.base.js') }} "></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('theme/AdminTemplate/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('theme/AdminTemplate/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/js/misc.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/js/settings.js') }}"></script>
    <script src="{{ asset('theme/AdminTemplate/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('theme/AdminTemplate/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
