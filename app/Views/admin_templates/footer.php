   <style>
       .app-footer {
           background: transparent;
           display: flex;
           justify-content: space-between;
       }
   </style>
   <!--begin::Footer-->
   <footer class="app-footer">
       <div class="float-right d-sm-inline-block">
           <!--begin::To the end-->
           <div class="float-end d-none d-sm-inline"></div>
           <!--end::To the end-->
           <!--begin::Copyright-->
           <strong>
               &copy; <span id="currentYear"></span> Shivangani Tandon Academy
           </strong>
           All rights reserved.
           <!--end::Copyright-->
       </div>


       <div class="float-right d-sm-inline-block">
           <b>Design And Developed by
               <a href="https://www.techmapperz.com/" target="_blank" rel="noopener noreferrer" title="Visit Techmapperz website">Techmapperz</a>
           </b>
       </div>
   </footer>
   <!--end::Footer-->

   <script>
       // Set current year dynamically
       document.getElementById("currentYear").textContent = new Date().getFullYear();
   </script>