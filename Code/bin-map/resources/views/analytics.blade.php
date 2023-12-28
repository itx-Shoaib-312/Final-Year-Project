
@extends('layouts.app')
@include('header')
@section('content')


    <div class="container-fluid">
        <div class="row mainC mt-2">
            <div class="col-md-3 mb-3 sideBar me-2" id="sideM">
            @include("./sidebar")
            </div>
           
            <div class="col-md-8 mainContent" id="mainM">
            <div class="card p-2">
           
          
           
 
          
 <div class=" " style="background:#fff">
        <h1 class="text-center " style="color:#329600">Analytics</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach ($chartData as $key => $chart)
        <li class="nav-item  ">
            <a class="nav-link @if ($key == 0) active @endif" id="{{ $chart['label'] }}-tab" data-toggle="tab" href="#{{ $chart['label'] }}" role="tab" aria-controls="{{ $chart['label'] }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">{{ $chart['label'] }}</a>
        </li>
    @endforeach
</ul>
<div class="tab-content" id="myTabContent" style="background:#0000;">
    @foreach ($chartData as $key => $chart)
        <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $chart['label'] }}" role="tabpanel" aria-labelledby="{{ $chart['label'] }}-tab" style="background:#fff">
            <canvas id="{{ $chart['label'] }}-canvas" style="background:#fff;width:100% !important;"></canvas>
            <script>
                var ctx = document.getElementById("{{ $chart['label'] }}-canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [
                            @foreach ($chart['months'] as $month)
                                "{{ $month }}",
                            @endforeach
                        ],
                        datasets: [{
                            label: "{{ $chart['label'] }}",
                            data: [
                                @foreach ($chart['data'] as $data)
                                    {{ $data }},
                                @endforeach
                            ],
                            backgroundColor: "{{ $chart['backgroundColor'] }}",
                            borderColor: "{{ $chart['borderColor'] }}",
                            borderWidth: "{{ $chart['borderWidth'] }}"
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                
                                    beginAtZero: true,
                                    suggestedMax: 100
                                
                            }
                        }
                    }
                });
            </script>
        </div>
    @endforeach
    <div class="container my-3">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ask For New Bin
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please Fill The Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        


      </div>
      <div class="modal-body right">
      <form action="{{ route('send-email') }}" method="POST">
      @csrf
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" class="form-control" id="company" placeholder="Company Name" name="company">
                          </div>
                          <div class="form-group">
                            <label for="conName">Contact Name</label>
                            <input type="text" class="form-control" id="conName" aria-describedby="emailHelp" placeholder="Contact Name" name="contact_name">
                           
                          </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email address</label>
                            <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                           
                          </div>
                         
                    
                   
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
                          </div>
                          <div class="form-group">
                            <label for="location">Location Of The New Bin</label>
                            <input type="text" class="form-control" id="location" aria-describedby="emailHelp" placeholder="Location" name="location">
                           
                          </div>
                        <div class="form-group">
                            <label for="size">Size Of The Bin</label>
                            <input type="text" class="form-control" id="size" aria-describedby="emailHelp" placeholder="Enter size" name="size">
                           
                          </div>
                         
                    
                  
                        <div>
                            <label for="size">Is Power Supply Available ?</label>
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="power_supply" id="exampleRadios1" value="Yes" >
                                    <label class="form-check-label" for="exampleRadios1">
                                      yes
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio"  id="exampleRadios2" value="No" name="power_supply">
                                    <label class="form-check-label" for="exampleRadios2">
                                      No
                                    </label>
                                  </div>
                            </div>
                            
                        </div>
                       
                          
                          <div class="form-group">
                            <label for="Material">Material of Bin</label>
                            <input type="text" class="form-control" id="material" aria-describedby="emailHelp" placeholder="Enter Material" name="material">
                           
                          </div>
                        <div class="form-group">
                            <label for="waste">What kind Of Waste </label>
                            <input type="text" class="form-control" id="waste" aria-describedby="emailHelp" placeholder="Type of Waste" name="waste">
                           
                          </div>
                         
                    
                    <div class="d-flex flex-column  flex-sm-column flex-md-row justify-content-between mt-2">
                           <div>
                            <label class="form-label" for="textAreaExample">Additional Information</label></label>
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample1" rows="6" cols="100" name="additional_info"></textarea>
                               
                              </div>
                           </div>
                    </div>
                   
                   
                   <div class="mt-3 d-flex justify-content-center">
                    <button  class="btn sendBtn " >Send</button>
                   </div>
                   
                  </form>
           </div>
     
    </div>
  </div>
 
</div>


</div>

    </div>
    <script>
    $(document).ready(function () {
        let ball=document.getElementById('ball');
      ball.classList.add('ch');
    ball.classList.remove('ch1');
        // let a=document.querySelectorAll('#myTab a');)
        let tabPane=document.querySelectorAll('.tab-pane');
        tabPane.forEach(tab=>{
            
            tab.classList.remove('active')
        })

    let navLinks=document.querySelectorAll('#myTab a');
    navLinks.forEach(link=>{
         link.classList.remove('active')
        link.onclick=()=>{
             navLinks.forEach(ele=>{
                 ele.classList.remove('active')
             })
            // console.log(link.href);
            tabPane.forEach(tab=>{
            
                 tab.classList.remove('active')
                //  tab.classList.remove('show')
                 let w=link.href.split(/[/?:&=#]/);
                   let lw=w.pop()
                if(lw===tab.id){
                    tab.classList.add('active')
                    ;
                    link.classList.add('active')
                }
                else{
                 
                    // console.log("false"+lw )
                }
            
            })
            // $("#profile3").tab('show')
        }
    })
    })
</script>
</div>


           <!-- end new -->
            <div>
    <!-- <canvas id="lineChart"></canvas> -->
</div>
           </div>
        
            </div>
        </div>
    </div>
    


@endsection
@yield('scripts')
@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


   <script >
    $(document).ready( function () {
        let navM=document.getElementById("navM");
let sideM=document.getElementById("sideM");
let mainM=document.getElementById("mainM")


let body=document.getElementById("body");
let navUl=document.getElementById("navUl")
let navlink=document.querySelectorAll(".nav-link")

let modeBtn=document.getElementById("checkbox");

// modeBtn.onchange=()=>{
//     console.log('click')
//       if(modeBtn.checked){
//         navM.classList.remove("darkMode")
//         sideM.classList.remove("darkMode")
//         mainM.classList.remove("darkMode")
      
//         navUl.classList.remove("darkMode")
//        navlink.forEach(element=>{
//         element.classList.remove("darkMode")
     
//        });
    

       
//       }
//       else{
//         navM.classList.add("darkMode")
//         sideM.classList.add("darkMode")
//         mainM.classList.add("darkMode")
       
//         navUl.classList.add("darkMode")
//         navlink.forEach(element=>{
//         element.classList.add("darkMode")
       
//        });
     
        
       
      
//       }
//     }
// })

function setDarkModePreference(isDarkMode) {
  if (isDarkMode) {
    navM.classList.remove("darkMode")
        sideM.classList.remove("darkMode")
        mainM.classList.remove("darkMode")
      
        navUl.classList.remove("darkMode")
       navlink.forEach(element=>{
         element.classList.remove("darkMode")})
         ball.classList.add('ch');
    ball.classList.remove('ch1');
  } else {
    navM.classList.add("darkMode")
        sideM.classList.add("darkMode")
        mainM.classList.add("darkMode")
       
        navUl.classList.add("darkMode")
        navlink.forEach(element=>{
        element.classList.add("darkMode")
       
       });
       ball.classList.add('ch1');
    ball.classList.remove('ch');
  }
}

modeBtn.onchange = () => {
  let isDarkMode = modeBtn.checked;
  console.log(isDarkMode)
  setDarkModePreference(isDarkMode);
  localStorage.setItem("darkMode", isDarkMode);
};

// on page load, check localStorage for the user's preference and set the dark mode accordingly
let savedDarkMode = localStorage.getItem("darkMode");
if (savedDarkMode === "true") {
  modeBtn.checked = true;
  setDarkModePreference(true);
  navM.classList.remove("darkMode")
        sideM.classList.remove("darkMode")
        mainM.classList.remove("darkMode")
      
        navUl.classList.remove("darkMode")
       navlink.forEach(element=>{
         element.classList.remove("darkMode")})
}


    else
{
    navM.classList.add("darkMode")
        sideM.classList.add("darkMode")
        mainM.classList.add("darkMode")
       
        navUl.classList.add("darkMode")
        navlink.forEach(element=>{
        element.classList.add("darkMode")
       
       });
  }

})
    // navlink.forEach(element=>{
    //    element.onclick=()=>{
    //     element.classList.remove('active')
    //     element.classList.toggle('active')
    //    }
    // });
// var ctx = document.getElementById('myChart').getContext('2d');
  
//   // Set the data
//   var data = {
//     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
//     datasets: [{
//       label: 'Fullness level',
//       data: [50, 34, 50, 80, 10, 100],
//       backgroundColor: '#329600',
//       borderColor: '#329600',
//       borderWidth: 1,
//     }
    
// ],
    
//   };
  
//   // Set the options
//   var options = {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   };
  
//   // Create the chart
//   var myChart = new Chart(ctx, {
//     type: 'line',
//     data: data,
//     options: options
//   });
    // backend chart

//     $( "#exportBtn" ).click(function() {
//         var wb = XLSX.utils.book_new();
    
//     // convert the table to a worksheet and add it to the workbook
//     var ws = XLSX.utils.table_to_sheet(table);
//     XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    
//     // save the workbook as an Excel file
//     XLSX.writeFile(wb, "data.xlsx");
// });
//     console.log("exp"+exportBtn)
  // backend chart
  $(document).ready(function() {
    $('form').submit(function(event) {
        // event.preventDefault(); // prevent the default form submission behavior
        // your code to handle form submission goes here
        console.log('form-sun')
    });
});
   </script>
