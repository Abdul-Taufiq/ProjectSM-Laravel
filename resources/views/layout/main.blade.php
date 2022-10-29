@include('partial.header')
@yield('header')
@include('partial.sidebar')


<!-- Begin Page Content -->
<div class="container-fluid">


   <!-- ISI KONTEN -->
   @yield('konten')




               <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sewa Mobil  <?php echo date("Y"); ?> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

@include('partial.footer')

@yield('footer')