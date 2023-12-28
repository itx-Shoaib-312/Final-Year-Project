
@extends('layouts.app')
@include('header')
@section('content')



    <div class="container-fluid">
        <div class="row mainC mt-2">
            <div class="col-md-3 mb-3 sideBar me-2" id="sideM">
            @include("./sidebar")
            </div>
        
            <div class="col-md-8 mainContent" id="mainM">
            <div class="d-flex flex-column flex-md-row pt-3 upperSection">
            <p class="text-muted mx-3">Actions</p>
            <p class="text-muted fw-bold mx-2">History</p>
            <p class="text-muted fw-bold mx-2">Edit</p>
            <p class="text-muted fw-bold mx-2">Deleted</p>
            <button class="btn expBtn mx-2 my-1" id="exportBtn">Export</button>
            <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
+Add New
</button>
<!-- Modal start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Bin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST"  action="{{ url('/home') }}">
      @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Identifier</label>
    <input type="text" class="form-control" id="identifier" aria-describedby="emailHelp" name="identifier">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Location</label>
    <input type="text" class="form-control" id="location" name="location">
  </div>
  <div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <input type="text" class="form-control" id="type" aria-describedby="emailHelp" name="type">
   
  </div>
  <div class="mb-3">
    <label for="size" class="form-label">Size</label>
    <input type="text" class="form-control" id="size" name="size">
  </div>
  <div class="mb-3">
    <label for="full" class="form-label">Fullness</label>
    <input type="text" class="form-control" id="full" name="fullness">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
         </div>
         <div class="table-responsive  mt-3 p-4">
          <table class="table  table-striped " id="myTable">
            <thead>
              <tr>
                <th scope="col" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.5" y="0.5" width="23" height="23" rx="7.5" fill="white"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M19.75 12C19.75 11.5858 19.4142 11.25 19 11.25H5C4.58579 11.25 4.25 11.5858 4.25 12C4.25 12.4142 4.58579 12.75 5 12.75H19C19.4142 12.75 19.75 12.4142 19.75 12Z" fill="#8A8A8E"/>
                  <rect x="0.5" y="0.5" width="23" height="23" rx="7.5" stroke="#8A8A8E"/>
                  </svg>
                  </th>
                <th scope="col" >
                  Identifier
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                    
                </th>
                <th scope="col" >Location
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                    
                </th>
                <th scope="col" >Type
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                    
                </th>
                <th scope="col" >
                  Size 
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                    
                </th>
                <th scope="col" >Fulness
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.4838 19.2661C11.2513 20.258 12.7488 20.258 13.5163 19.2661C15.8357 16.2685 17.6638 12.9213 18.9323 9.34979L19.164 8.69732C19.6074 7.44904 18.7628 6.13053 17.4743 5.96154C13.874 5.48938 10.1261 5.48938 6.52585 5.96154C5.2373 6.13053 4.39274 7.44904 4.83608 8.69731L5.06781 9.34979C6.33629 12.9213 8.16445 16.2685 10.4838 19.2661Z" fill="#329600"/>
                    </svg>
                    
                </th>
                <th scope="col" > Created At
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                    
                </th>
                <th scope="col" >
                  Updated
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                </th>
                <!-- <th scope="col" >
                  State
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.878 8.75H4C3.58579 8.75 3.25 8.41421 3.25 8C3.25 7.58579 3.58579 7.25 4 7.25H13.878C14.1869 6.37611 15.0203 5.75 16 5.75C16.9797 5.75 17.8131 6.37611 18.122 7.25H20C20.4142 7.25 20.75 7.58579 20.75 8C20.75 8.41421 20.4142 8.75 20 8.75H18.122C17.8131 9.62389 16.9797 10.25 16 10.25C15.0203 10.25 14.1869 9.62389 13.878 8.75Z" fill="#8A8A8E"/>
                    <path d="M20 16.75C20.4142 16.75 20.75 16.4142 20.75 16C20.75 15.5858 20.4142 15.25 20 15.25H10.122C9.81309 14.3761 8.97966 13.75 8 13.75C7.02034 13.75 6.18691 14.3761 5.87803 15.25H4C3.58579 15.25 3.25 15.5858 3.25 16C3.25 16.4142 3.58579 16.75 4 16.75H5.87803C6.18691 17.6239 7.02034 18.25 8 18.25C8.97966 18.25 9.81309 17.6239 10.122 16.75H20Z" fill="#8A8A8E"/>
                    </svg>
                </th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <th scope="row">1</th>
                <td>Bin0001</td>
                <td>Budapest, HU
                  Bajza utca 12</td>
                <td>Used Coking Oil</td>
                <td>800L</td>
                <td>
                  100%<div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                </div></td>
                <td>12-7-23</td>
                <td>12-7-23</td>
                <td>Full</td>
              </tr> -->
              @foreach ($bins as $bin)
        <tr>
            <td>{{ $bin->id }}</td>
            <td>{{ $bin->identifier }}</td>
            <td>{{ $bin->location }}</td>
            <td>{{ $bin->type }}</td>
            <td>{{ $bin->size }}</td>
            <td>{{ $bin->fullness }}<br>
            <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $bin->fullness }}%" aria-valuenow="{{ $bin->fullness }}" aria-valuemin="0" aria-valuemax="100"></div>
</div>
              </td>
            <td>{{ $bin->created_at }}</td>
            <td>{{ $bin->updated_at}}</td>
            <!-- <td>{{ $bin->status }}</td> -->
            <td><form action="{{ route('bins.delete', $bin->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete Bin</button>
</form></td>
        </tr>
        @endforeach
              
              
        
            </tbody>
          </table>
         </div>
        
            </div>
        </div>
    </div>
    


@endsection
@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

   <script >
    $(document).ready( function () {
      let ball=document.getElementById('ball')
      ball.classList.add('ch');
    ball.classList.remove('ch1')
      console.log('ball' + ball)

        $('#myTable').DataTable();
    let navM=document.getElementById("navM");
    let sideM=document.getElementById("sideM");
    let mainM=document.getElementById("mainM")
    let table = document.getElementById("myTable");
    let exportBtn=document.getElementById("exportBtn");
    let exp=document.querySelector("#exportBtn");
    // console.log(exp)
    let body=document.getElementById("body");
    let navUl=document.getElementById("navUl");
    let navlink=document.querySelectorAll(".nav-link");
    let myTablefilter=document.getElementById("myTablefilter")
    exportBtn.onclick = () => {
  var wb = XLSX.utils.book_new();
  
  // convert the table to a worksheet and add it to the workbook
  var ws = XLSX.utils.table_to_sheet(table);
  
  // set the column width for the date column
  ws["!cols"] = [{ width: 15 }, { width: 15 }, { width: 15 }, { width: 20 },{ width: 20 },{ width: 20 },{ width: 20 },{ width: 20 }];
  
  // add the worksheet to the workbook
  XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
  
  // save the workbook as an Excel file
  XLSX.writeFile(wb, "data.xlsx");
};
  
    let modeBtn=document.getElementById("checkbox");
  
    function setDarkModePreference(isDarkMode) {
  if (isDarkMode) {
    navM.classList.remove("darkMode");
    sideM.classList.remove("darkMode");
    mainM.classList.remove("darkMode");
    table.classList.remove("table-dark");
    navUl.classList.remove("darkMode");
    ball.classList.add('ch');
    ball.classList.remove('ch1');

    // myTablefilter.classList.remove("darkMode");
    navlink.forEach((element) => {
      element.classList.remove("darkMode");
    });
    // myTablefilter.classList.remove("darkMode");
  } else {
    navM.classList.add("darkMode");
    sideM.classList.add("darkMode");
    mainM.classList.add("darkMode");
    table.classList.add("table-dark");
    navUl.classList.add("darkMode");
    navlink.forEach((element) => {
      element.classList.add("darkMode");

      // myTablefilter.classList.add("darkMode");
    });
    ball.classList.add('ch1')
    ball.classList.remove('ch');
    //    myTablefilter.classList.add("darkMode")
  }
}

modeBtn.onchange = () => {
  console.log('modebtnonchange')
  let isDarkMode = modeBtn.checked;
  setDarkModePreference(isDarkMode);
  localStorage.setItem("darkMode", isDarkMode);
};

// on page load, check localStorage for the user's preference and set the dark mode accordingly
let savedDarkMode = localStorage.getItem("darkMode");
console.log(savedDarkMode)
if (savedDarkMode === "true") {
  modeBtn.checked = true;
  navM.classList.remove("darkMode");
    sideM.classList.remove("darkMode");
    mainM.classList.remove("darkMode");
    table.classList.remove("table-dark");
    navUl.classList.remove("darkMode");
    myTablefilter.classList.remove("darkMode");
    navlink.forEach((element) => {
      element.classList.remove("darkMode");
    });
    ball.classList.add('ch');
    ball.classList.remove('ch1')
  setDarkModePreference(true);
}
else{
  navM.classList.add("darkMode");
    sideM.classList.add("darkMode");
    mainM.classList.add("darkMode");
    table.classList.add("table-dark");
    navUl.classList.add("darkMode");
    navlink.forEach((element) => {
      element.classList.add("darkMode");
      // myTablefilter.classList.add("darkMode");
    });
    ball.classList.add('ch1')
    ball.classList.remove('ch')
}
    })
   
//     $( "#exportBtn" ).click(function() {
//         var wb = XLSX.utils.book_new();
    
//     // convert the table to a worksheet and add it to the workbook
//     var ws = XLSX.utils.table_to_sheet(table);
//     XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    
//     // save the workbook as an Excel file
//     XLSX.writeFile(wb, "data.xlsx");
// });
//     console.log("exp"+exportBtn)
   
   </script>
