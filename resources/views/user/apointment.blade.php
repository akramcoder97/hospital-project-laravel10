<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" name="name" placeholder="nom et prenom" required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control" required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select" required>
              <option value="">--choisir un medecin--</option>
              @foreach($doctor as $doctors)
                <option value="{{$doctors->name}}">{{$doctors->name}} -- specialite -- {{$doctors->specialite}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone" class="form-control" placeholder="numéro de telephone" required>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        @if(Route::has('login'))
        @auth
          <button type="submit" class="btn btn-primary mt-3 wow zoomIn">envoyer le RDV</button>
          @else
          <button class="btn btn-primary mt-3 " style="cursor: not-allowed;" disabled>inscrit d'abbord</button>
          @endauth
        @endif
      </form>
    </div>
  </div> <!-- .page-section -->
