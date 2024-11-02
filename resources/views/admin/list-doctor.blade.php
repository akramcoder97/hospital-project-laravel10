
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>liste des rendez vous</title>

    @include('admin.css')
  </head>

  <script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>



  <style>
    .appoint-list{
        width: 100% !important;
    }
    .approved {
            color: green;
        }


        #blur-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            display: none;
            z-index: 9998;
          }
          .popup{
            display: none;
            position: fixed;
            top: 30px;
            width: 70%;
            z-index: 9999;
            opacity: 0;
            animation: 0.4s fade;
          }
          .popup .card-body{
            overflow-y: scroll;
            overflow-x: hidden;
            height: 550px;
          }
          .popup.show{
            opacity: 1;
            display: block;
          }
          .close,
          .closeEdit{
            position: absolute;
            right: 20px;
            top: 8px;
            cursor: pointer;
          }
          @keyframes fade{ 
            0%{
                opacity: 0;
            }
            100%{
                opacity: 100%;
            }
          }

          #deleteModal .modal-content{
            background: #191c24;
          }
          #deleteModal .btn-close{
            font-size: 30px;
            border: none;
            background: none;          
          }
  </style>

  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.side-bar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="{{url('user/profile')}}">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                       <p class="preview-subject mb-1">profile</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" href="#" type="submit">Logout</button>
                        </form>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>  
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
      
        <!-- partial -->


<div style="width:100%;" class="container-fluid page-body-wrapper">
        <div class="appoint-list col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des medecins</h4>
                    @if(session()->has('message'))

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session()->get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                        <tr>
                            <th> nom de medecin </th>
                            <th> specialité </th>
                            <th> telephone </th>
                            <th> numéro de chambre </th>
                            <th> photo </th>
                            <th> action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $doctor)
                        <tr id="doctor-{{$doctor->id}}">
                            <td class="d-none id">{{$doctor->id}}</td>
                            <td class="name">{{$doctor->name}}</td>
                            <td class="speciality">{{$doctor->specialite}}</td>
                            <td class="phone">{{$doctor->phone}}</td>
                            <td class="room">{{$doctor->room}}</td>
                            <td class="image"><img src="/assets/img/{{$doctor->image}}" class="image" style="width:90px; height:90px;" load="lazy" alt=""></td>
                            <td>
                              <button id="ApopupButton" class="btn btn-success edit-button" data-id="{{$doctor->id}}"><i class="mdi mdi-table-edit "></i></button>
                              <a class="btn btn-danger delete-button" data-id="{{$doctor->id}}"><i class=" mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>


      <!-- delete Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
              <button type="button" class="btn btn-danger close-modal">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              etes vous sur de suprimer ce medecin ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger confirm-delete">Suprimer ce medecin</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end delete modal -->


       <!-- Edit Modal -->
 <div class="modal fade" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="editDoctorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDoctorLabel">Modifier le medecin</h5>
        <button type="button" class="btn btn-danger close-modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editDoctorForm" action="" method="" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="doctorName">nom de medecin</label>
            <input type="text" class="form-control e-name text-light" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Specialité</label><br>
            <select class="text-center text-start bg-dark text-light border-0 rounded e-speciality" name="specialite" style="height: 40px; width:130px;" id= "">
                <option value=""> Choisir</option>
                <option value="skin">peau</option>
                <option value="heart">coeur</option>
                <option value="eye">eye</option>
                <option value="nose">nose</option>
            </select>
            </div>
          <div class="form-group">
            <label for="doctorSpecialty">telephone</label>
            <input type="text" class="form-control e-phone text-light" name="phone" placeholder="telephone">
          </div>
          <div class="form-group">
            <label for="doctorSpecialty"> numéro de chambre </label>
            <input type="text" class="form-control text-light e-room" name="room" placeholder="chambre">
          </div>
          <div class="form-group">
            <label for="doctorSpecialty"> photo </label>
            <input type="file" class="form-control text-light e-image" name="image">
          </div>
          <input type="hidden" class="e-id" name="id" id="doctorId">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" id="saveChanges">Sauvegarder </button>
      </div>
    </div>
  </div>
</div>

      <!-- end edit modal -->

    </div>    
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
    <script>
     // delete modal ---
    $(document).ready(function() {
       var deleteAppoint;

        // Open the delete modal and set the product ID
        $('.delete-button').click(function() {
            deleteAppoint = $(this).data('id');
            $('#deleteModal').modal('show');
        });

        // confirm deletion
        $('.confirm-delete').click(function() {
        
            $.ajax({
                url: '/deleteAppoint/' + deleteAppoint,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    $('#appoint-' + deleteAppoint).remove();
                },
                error: function(response) {
                    alert('Erreur !');
                }
            });
        }); 

        // pop up edit doctor form
        $('.edit-button').click(function() {
            // handle edit btn event
            var doctorId = $(this).data('id');
            $('#editDoctorModal').modal('show');

            var _this = $(this).parents('tr');
            $('.e-id').val(_this.find('.id').text());
            $('.e-name').val(_this.find('.name').text());
            $('.e-speciality').val(_this.find('.speciality').text());
            $('.e-phone').val(_this.find('.phone').text());
            $('.e-room').val(_this.find('.room').text());
        }); 

        $('#saveChanges').click(function() {
            var doctorId          = $('.e-id').val();
            var doctorName        = $('.e-name').val();
            var doctorSpecialite  = $('.e-speciality').val();
            var doctorPhone       = $('.e-phone').val();
            var doctorRoom        = $('.e-room').val();
            var doctorImage       = $('.e-image')[0].files[0]; 

            var formData = new FormData(); // Create a FormData object ( we use it when there is an input type file)
            // Append form fields
            formData.append('id', doctorId);
            formData.append('name', doctorName);
            formData.append('speciality', doctorSpecialite);
            formData.append('phone', doctorPhone);
            formData.append('room', doctorRoom);

            // Append the image file if it's available
            if (doctorImage) {
              formData.append('image', doctorImage);
            }
            // Append CSRF token
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '/editDoctor',
                type: 'POST',
                data: formData,
                processData: false,  // Important: Don't process the data
                contentType: false,  // Important: Set content type to false
                success: function(response) {
                  //alert('medecin modifiée avec succéss');
                  // update the table with new data
                  var row = $('#doctor-' + doctorId);
                  row.find('.name').text(doctorName); // Update the doctor's name
                  row.find('.speciality').text(doctorSpecialite);  // Update the doctor's speciality
                  row.find('.phone').text(doctorPhone);   // Update the doctor's phone
                  row.find('.room').text(doctorRoom);    // Update the doctor's room
                  if (doctorImage) {
                    // Update the doctor's image in the table if a new image was uploaded
                    var imageUrl = '/assets/img/' + response.new_image; // Assuming the new image name is returned in response
                    row.find('.image').attr('src', imageUrl); // Update the image source
                  }
                  row.css('background-color', '#d4edda'); // Green background for visual feedback
                  setTimeout(function() {
                    row.css('background-color', ''); // Reset to original color after 2 seconds
                  }, 2000);
                  $('#editDoctorModal').modal('hide');
                },
                error: function(response) {
                  alert('Erreur !!');
                }
                });
            });

            // close modals
        $('.close-modal').click(function() {
            $('#editDoctorModal,#deleteModal').modal('hide');
        });
     });
    </script>
    
  @include('admin.script')

  </body>
</html>