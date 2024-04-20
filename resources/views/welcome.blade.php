@extends('content')
@section('title', 'Lander Matthew Gucela | Portfolio')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
        @foreach ( $websites as $website )
            <a class="navbar-brand" href=""><img src="{{ asset ('asset/images/lm.png')}}" style="width: 50px;"></a>
        @endforeach
    </div>
</nav>
<section id="home-section" class="hero" style="height: 900px;">
	<div class="home-info">
		<div class="text one-forth" data-aos="fade-right">
			@foreach ($abouts as $about)
			<h1 class="mb-4 mt-3">Hi, I'm <span>{{ $about->name }}!</span></h1>
			<h2 class="mb-4">A {{ $about->job }}</h2>
			<h2 class="mb-4">From <span>{{ $about->country }}.<span></h2>
			<!-- Removed unnecessary closing tag </p> -->
			@endforeach
			<canvas id="c"></canvas> <!-- Place the canvas element here -->
		</div>
	</div>
</section>



    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section" style="height: 900px;">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex">
    				<div class="img-about img d-flex align-items-stretch" data-aos="zoom-in">
    					<div class="overlay"></div>
						<div class="img d-flex align-self-stretch align-items-center" style="background-image: url('{{ asset('asset/images/front.png') }}'); background-size: contain; width: 120%; height: 120%;">
	    				</div>
    				</div>
    			</div>
				

    			<div class="col-md-6 col-lg-7 pl-lg-5 pb-5" data-aos="fade-left">
					@csrf
					@foreach($abouts as $about)
					<div class="terminal">
						<div class="header">
						  <div class="top">
							<div class="circle">
							  <span class="red circle2"></span>
							</div>
							<div class="circle">
							  <span class="yellow circle2"></span>
							</div>
							<div class="circle">
							  <span class="green circle2"></span>
							</div>
							<div class="title">
							  <p id="title2">About.css</p>
							</div>
						  </div>
						</div>
						<div class="code-container">
						  <textarea readonly="" name="code" id="code" class="area">{{$about->description}}
						
						
{{$about->address}}, {{$about->zip_code}}</textarea
						  >
						</div>
					  </div>
					  
					  @endforeach
	          <div class="counter-wrap  d-flex mt-md-3">
				@csrf 
				@foreach ($abouts as $about)
              <div class="text">
			  <a href="{{ asset( $about->cv )}}"download="YourCVFileName.pdf" >
				<button class="btn-17">
					<span class="text-container">
					<span class="text">Download CV</span>
					</span>
				</button>
				</a>
				@endforeach
              </div>
	          </div>
			</div>
        </div>
    	</div>
    </section>

	<section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center">
                    <h1 class="big big-2" data-aos="fade-up">Qualification</h1>
					<h2 class="mb-4" data-aos="fade-up">Timelines</h2>
                </div>
            </div>
            <div class="tabs">
			<h4 class="work selected" onclick="showWorkTab()" style="cursor: pointer;">Experience</h4>
			<h4 class="educ" onclick="showEducationTab()" style="cursor: pointer;">Education</h4>
            </div>
            <div class="education-tab" style="display:none;">
				<div class="container right-container mt-4 work-container">
					<h2 class="card_title text-l mt-4 ml-4 mb-4">Education
						<svg class="h-8 w-8 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18 15a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path><path d="M6 3a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><path d="M6 9v12"></path></svg>
					</h2>
					<div class="flex-container">
						@csrf
						@foreach($timelines as $timeline)
						<div class="text-box">
							<div class="image-container">
								<img src="{{ asset($timeline->image)}}">
							</div>
							<div class="line"></div>
							<div class="text-content">
								<h5>{{ $timeline->school }}</h5>
								<h6>{{ $timeline->course }}</h6>
								<small>{{ $timeline->year }}</small>
							</div>
						</div>
						@endforeach
					</div>
				</div>
            </div>
			<div class="work-tab">
				<div class="container right-container mt-4 work-container">
					<h2 class="card_title text-l mt-4 ml-4 mb-4">Work Experience
						<svg class="h-8 w-8 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18 15a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path><path d="M6 3a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><path d="M6 9v12"></path></svg>
					</h2>
					<div class="flex-container">
						@csrf
						@foreach($experiences->sortbyDesc('id') as $experience)
						<div class="text-box">
							<div class="image-container">
								<img src="{{ asset($experience->image)}}">
							</div>
							<div class="line"></div>
							<div class="text-content">
								<h5>{{ $experience->project }}</h5>
								<h6>{{ $experience->role }}</h6>
								<small>{{ $experience->year }}</small>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center ">
                    <a href="{{ asset( $about->cv )}}" download="YourCVFileName.pdf" >
                        <button class="btn-17">
                            <span class="text-container">
                                <span class="text">Download CV</span>
                            </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

	<section class="ftco-section ftco-skills" id="skills-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-12 heading-section text-center">
                <h1 class="big big-2" data-aos="fade-up">Skill</h1>
				<h2 class="mb-4" data-aos="fade-up">Technical Skills</h2>
            </div>
            {{-- Here --}}
                <div class="front-container" onmouseover="changeBackground(this)" onmouseleave="resetBackground(this)" data-aos="fade-right">
                    <div class="d-flex align-items-center">
                        
                        <div>
						@foreach ($skills as $key => $skill)
							@if ($skill->skill == 'Front End')
								<h4 class="mb-1">{{ $skill->skill }}</h4>
								{{-- <h6 class="mb-0">{{ $skill->experience }}</h6> --}}
								@break
							@endif
						@endforeach
                        </div>
                    </div>
                    <div class="skill-box">
                        @foreach ($skills as $skill)
                            @if ($skill->skill == 'Front End')
                                <div class="skill">
                                    <div class="icon">
                                        <img src="{{ asset($skill->image) }}">
                                    </div>
                                    <div class="text">
                                        <span>{{ $skill->name }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
					<div class="d-flex align-items-center">
                        
                        <div>
						@foreach ($skills as $key => $skill)
							@if ($skill->skill == 'Back End')
								<h4 class="mb-1">{{ $skill->skill }}</h4>
								{{-- <h6 class="mb-0">{{ $skill->experience }}</h6> --}}
								@break
							@endif
						@endforeach
                        </div>
                    </div>
                    <div class="skill-box">
                        @foreach ($skills as $skill)
                            @if ($skill->skill == 'Back End')
                                <div class="skill">
                                    <div class="icon">
                                        <img src="{{ asset($skill->image) }}">
                                    </div>
                                    <div class="text">
                                        <span>{{ $skill->name }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
					<div class="d-flex align-items-center">
                        
                        <div>
						@foreach ($skills as $key => $skill)
							@if ($skill->skill == 'Others')
								<h4 class="mb-1">{{ $skill->skill }}</h4>
								{{-- <h6 class="mb-0">{{ $skill->experience }}</h6> --}}
								@break
							@endif
						@endforeach
                        </div>
                    </div>
                    <div class="skill-box">
                        @foreach ($skills as $skill)
                            @if ($skill->skill == 'Others')
                                <div class="skill">
                                    <div class="icon">
                                        <img src="{{ asset($skill->image) }}">
                                    </div>
                                    <div class="text">
                                        <span>{{ $skill->name }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            {{-- Here --}}
        </div>
    </div>
</section>


 

    <section class="ftco-section ftco-project" id="projects-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ">
          	<h1 class="big big-2" data-aos="fade-up">Project</h1>
			  <h2 class="mb-4" data-aos="fade-up">Works</h2>
          </div>
		  @csrf 
		  @foreach ($works as $key => $work)
		  <div class="work-card mr-4">
			<div class="card {{ $key == 0 ? 'expanded' : '' }}">
				<div class="card__bg">
				<div class="card__content">
					<p class="card__title">{{ $work->name }}</p>
					<p class="card__description">{{ $work->description }}</p>
					@if(!empty($work->link))
					<a href="{{ $work->link }}">
						<button class="card__button">
							<svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M17.25 19.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
								<path d="M23.083 17.609A6.48 6.48 0 0 0 17.25 13.5a6.48 6.48 0 0 0-5.833 4.109L11.25 18l.167.391A6.48 6.48 0 0 0 17.25 22.5a6.48 6.48 0 0 0 5.833-4.109L23.25 18l-.167-.391ZM17.25 21a3 3 0 1 1 0-5.999 3 3 0 0 1 0 5.999Z"></path>
								<path d="M9.3 15.6a4.5 4.5 0 1 1 7.2-3.6H15a3 3 0 1 0-4.8 2.4l-.9 1.2Z"></path>
								<path d="m21.978 8.283-1.77-3.066a1.498 1.498 0 0 0-1.78-.67l-1.825.617a8.283 8.283 0 0 0-.984-.57l-.378-1.888A1.5 1.5 0 0 0 13.77 1.5h-3.54a1.5 1.5 0 0 0-1.471 1.206L8.38 4.595a8.224 8.224 0 0 0-.995.565L5.57 4.546a1.498 1.498 0 0 0-1.78.671L2.02 8.283a1.5 1.5 0 0 0 .31 1.877l1.447 1.272c-.013.189-.028.376-.028.568 0 .193.007.384.02.574L2.33 13.84a1.5 1.5 0 0 0-.309 1.877l1.77 3.066a1.498 1.498 0 0 0 1.78.67l1.826-.617c.314.212.643.402.984.57l.378 1.888a1.5 1.5 0 0 0 1.47 1.206h1.02V21h-1.02l-.532-2.663a6.821 6.821 0 0 1-2.02-1.179l-2.586.875-1.77-3.066 2.043-1.796a6.695 6.695 0 0 1-.005-2.346L3.32 9.033l1.771-3.066 2.57.87a6.773 6.773 0 0 1 2.036-1.174L10.23 3h3.54l.532 2.663c.737.274 1.42.672 2.021 1.179l2.585-.875 1.77 3.066-2.098 1.84.99 1.127 2.1-1.84a1.5 1.5 0 0 0 .31-1.877Z"></path>
								</svg>Demo
						</button>
					</a>
				@else
					<button class="card__button" onclick="redirectTo404()">
						<svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M17.25 19.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
							<path d="M23.083 17.609A6.48 6.48 0 0 0 17.25 13.5a6.48 6.48 0 0 0-5.833 4.109L11.25 18l.167.391A6.48 6.48 0 0 0 17.25 22.5a6.48 6.48 0 0 0 5.833-4.109L23.25 18l-.167-.391ZM17.25 21a3 3 0 1 1 0-5.999 3 3 0 0 1 0 5.999Z"></path>
							<path d="M9.3 15.6a4.5 4.5 0 1 1 7.2-3.6H15a3 3 0 1 0-4.8 2.4l-.9 1.2Z"></path>
							<path d="m21.978 8.283-1.77-3.066a1.498 1.498 0 0 0-1.78-.67l-1.825.617a8.283 8.283 0 0 0-.984-.57l-.378-1.888A1.5 1.5 0 0 0 13.77 1.5h-3.54a1.5 1.5 0 0 0-1.471 1.206L8.38 4.595a8.224 8.224 0 0 0-.995.565L5.57 4.546a1.498 1.498 0 0 0-1.78.671L2.02 8.283a1.5 1.5 0 0 0 .31 1.877l1.447 1.272c-.013.189-.028.376-.028.568 0 .193.007.384.02.574L2.33 13.84a1.5 1.5 0 0 0-.309 1.877l1.77 3.066a1.498 1.498 0 0 0 1.78.67l1.826-.617c.314.212.643.402.984.57l.378 1.888a1.5 1.5 0 0 0 1.47 1.206h1.02V21h-1.02l-.532-2.663a6.821 6.821 0 0 1-2.02-1.179l-2.586.875-1.77-3.066 2.043-1.796a6.695 6.695 0 0 1-.005-2.346L3.32 9.033l1.771-3.066 2.57.87a6.773 6.773 0 0 1 2.036-1.174L10.23 3h3.54l.532 2.663c.737.274 1.42.672 2.021 1.179l2.585-.875 1.77 3.066-2.098 1.84.99 1.127 2.1-1.84a1.5 1.5 0 0 0 .31-1.877Z"></path>
							</svg>Demo
					</button>
					<script>
						function redirectTo404() {
							window.location.href = '/404.html';
						}
					</script>
				@endif
												
					<a href="{{ $work->github }}">
						<button class="card__button secondary">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256">
							<g fill="currentColor" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M17.791,46.836c0.711,-0.306 1.209,-1.013 1.209,-1.836v-5.4c0,-0.197 0.016,-0.402 0.041,-0.61c-0.014,0.004 -0.027,0.007 -0.041,0.01c0,0 -3,0 -3.6,0c-1.5,0 -2.8,-0.6 -3.4,-1.8c-0.7,-1.3 -1,-3.5 -2.8,-4.7c-0.3,-0.2 -0.1,-0.5 0.5,-0.5c0.6,0.1 1.9,0.9 2.7,2c0.9,1.1 1.8,2 3.4,2c2.487,0 3.82,-0.125 4.622,-0.555c0.934,-1.389 2.227,-2.445 3.578,-2.445v-0.025c-5.668,-0.182 -9.289,-2.066 -10.975,-4.975c-3.665,0.042 -6.856,0.405 -8.677,0.707c-0.058,-0.327 -0.108,-0.656 -0.151,-0.987c1.797,-0.296 4.843,-0.647 8.345,-0.714c-0.112,-0.276 -0.209,-0.559 -0.291,-0.849c-3.511,-0.178 -6.541,-0.039 -8.187,0.097c-0.02,-0.332 -0.047,-0.663 -0.051,-0.999c1.649,-0.135 4.597,-0.27 8.018,-0.111c-0.079,-0.5 -0.13,-1.011 -0.13,-1.543c0,-1.7 0.6,-3.5 1.7,-5c-0.5,-1.7 -1.2,-5.3 0.2,-6.6c2.7,0 4.6,1.3 5.5,2.1c1.699,-0.701 3.599,-1.101 5.699,-1.101c2.1,0 4,0.4 5.6,1.1c0.9,-0.8 2.8,-2.1 5.5,-2.1c1.5,1.4 0.7,5 0.2,6.6c1.1,1.5 1.7,3.2 1.6,5c0,0.484 -0.045,0.951 -0.11,1.409c3.499,-0.172 6.527,-0.034 8.204,0.102c-0.002,0.337 -0.033,0.666 -0.051,0.999c-1.671,-0.138 -4.775,-0.28 -8.359,-0.089c-0.089,0.336 -0.197,0.663 -0.325,0.98c3.546,0.046 6.665,0.389 8.548,0.689c-0.043,0.332 -0.093,0.661 -0.151,0.987c-1.912,-0.306 -5.171,-0.664 -8.879,-0.682c-1.665,2.878 -5.22,4.755 -10.777,4.974v0.031c2.6,0 5,3.9 5,6.6v5.4c0,0.823 0.498,1.53 1.209,1.836c9.161,-3.032 15.791,-11.672 15.791,-21.836c0,-12.682 -10.317,-23 -23,-23c-12.683,0 -23,10.318 -23,23c0,10.164 6.63,18.804 15.791,21.836z"></path></g></g>
							</svg>Code
						</button>
					</a>
				</div>
				</div>
				<img src="{{ asset( $work->image ) }}">
			</div>
		  </div>
		  @endforeach
        </div>
    	</div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ">
            <h1 class="big big-2" data-aos="fade-up">Contact</h1>
			<h2 class="mb-4" data-aos="fade-up">Message me!</h2>
            <p></p>
          </div>
        </div>
		<div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form method="post" action="{{route('contact.store')}}" class="bg-light p-4 p-md-5 contact-form">
				@csrf 
				@method('post')
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}">
				@error('name')<span class="text-danger">{{$message}}</span>
				@enderror
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}">
				@error('email')<span class="text-danger">{{$message}}</span>
				@enderror
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
				@error('subject')<span class="text-danger">{{$message}}</span>
				@enderror
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message">{{ old('message') }}</textarea>
				@error('message')<span class="text-danger">{{$message}}</span>
				@enderror
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div class="img" style="background-image: url({{asset('asset/images/Developer.png')}});"></div>
          </div>
        </div>
        </div>
      </div>
    </section>
		
@csrf
@foreach ($websites as $website)
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
				<div class="social">
					<a class="social-link1" href="{{ $website->instagram }}">
						<svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
						<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" fill="white">
						</path>
						</svg>
					</a>
					<a class="social-link2" href="{{ $website->github }}">
						<svg viewBox="0 0 496 512" height="1em" fill="#fff" xmlns="http://www.w3.org/2000/svg">
						<path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
						</path>
						</svg> </a>
					<a class="social-link3" href="{{ $website->facebook }}">
					<svg style="color: white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
						<path fill="currentColor" d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"></path>
					</svg>
					</a>
					<a class="social-link4" href="{{ $website->twitter }}">
					<svg style="color: white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
						<path fill="currentColor" d="M 50.0625 10.4375 C 48.214844 11.257813 46.234375 11.808594 44.152344 12.058594 C 46.277344 10.785156 47.910156 8.769531 48.675781 6.371094 C 46.691406 7.546875 44.484375 8.402344 42.144531 8.863281 C 40.269531 6.863281 37.597656 5.617188 34.640625 5.617188 C 28.960938 5.617188 24.355469 10.21875 24.355469 15.898438 C 24.355469 16.703125 24.449219 17.488281 24.625 18.242188 C 16.078125 17.8125 8.503906 13.71875 3.429688 7.496094 C 2.542969 9.019531 2.039063 10.785156 2.039063 12.667969 C 2.039063 16.234375 3.851563 19.382813 6.613281 21.230469 C 4.925781 21.175781 3.339844 20.710938 1.953125 19.941406 C 1.953125 19.984375 1.953125 20.027344 1.953125 20.070313 C 1.953125 25.054688 5.5 29.207031 10.199219 30.15625 C 9.339844 30.390625 8.429688 30.515625 7.492188 30.515625 C 6.828125 30.515625 6.183594 30.453125 5.554688 30.328125 C 6.867188 34.410156 10.664063 37.390625 15.160156 37.472656 C 11.644531 40.230469 7.210938 41.871094 2.390625 41.871094 C 1.558594 41.871094 0.742188 41.824219 -0.0585938 41.726563 C 4.488281 44.648438 9.894531 46.347656 15.703125 46.347656 C 34.617188 46.347656 44.960938 30.679688 44.960938 17.09375 C 44.960938 16.648438 44.949219 16.199219 44.933594 15.761719 C 46.941406 14.3125 48.683594 12.5 50.0625 10.4375 Z"></path>
					</svg></a>
					</div>
                </div>
            </div>
        </div>
		@endforeach
		@csrf 
		@foreach ($websites as $website)
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Designed by {{ $website->name }} &copy;<script>document.write(new Date().getFullYear());</script></p>
            </div>
        </div>
		@endforeach
    </div>
</footer>


	<div class="navigation" style="bottom: 3.5dvh;">
	<div class="navigation-card" id="ftco-nav">
		<a href="#" class="tab">
		<svg width="46" height="46" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="m20.42 10.184-7.71-7.88a.999.999 0 0 0-1.42 0l-7.71 7.89a2 2 0 0 0-.58 1.43v8.38a2 2 0 0 0 1.89 2h14.22a2 2 0 0 0 1.89-2v-8.38a2.07 2.07 0 0 0-.58-1.44ZM10 20.004v-6h4v6h-4Zm9 0h-3v-7a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v7H5v-8.42l7-7.15 7 7.19v8.38Z"></path>
		</svg>
		</a>

		<a href="#about-section" class="tab">
		<svg width="46" height="46" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"></path>
		<path d="M18 21a1 1 0 0 0 1-1 7 7 0 1 0-14 0 1 1 0 0 0 1 1h12Z"></path>
		</svg>
		</a>

		<a href="#resume-section" class="tab">
		<svg width="46" height="46" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="m12 4.5-10 5 10 5 10-5-10-5Z"></path>
		<path d="M19 11v5l-7 3.5L5 16v-5"></path>
		<path d="M22 14v4"></path>
		</svg>
		</a>
		<a href="#skills-section" class="tab">
		<svg width="70" height="70" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="m12 2 10 6.5v7L12 22 2 15.5v-7L12 2z"></path>
		<path d="M12 22v-6.5"></path>
		<path d="m22 8.5-10 7-10-7"></path>
		<path d="m2 15.5 10-7 10 7"></path>
		<path d="M12 2v6.5"></path>
		</svg>
		</a>
		<a href="#projects-section" class="tab">
		<svg width="46" height="46" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="M7 21h10V7h-1V5.5A2.5 2.5 0 0 0 13.5 3h-3A2.5 2.5 0 0 0 8 5.5V7H7v14Zm3-15.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V7h-4V5.5Z"></path>
		<path d="M19 7v14a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3Z"></path>
		<path d="M5 7a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3V7Z"></path>
		</svg>
		</a>
		<a href="#contact-section" class="tab">
		<svg width="46" height="46" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="M19 4H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm-.67 2L12 10.75 5.67 6h12.66ZM19 18H5a1 1 0 0 1-1-1V7.25l7.4 5.55a1 1 0 0 0 1.2 0L20 7.25V17a1 1 0 0 1-1 1Z"></path>
		</svg>
		</a>
		</div>
	</div>
  
  

  <!-- loader -->
  <div id="loading" class="show fullscreen">
	<svg class="logo" xmlns="http://www.w3.org/2000/svg" width="100rem" height="100rem"  fill="currentColor" viewBox="0 0 450 852">
		<path id="back"
		  d="
		M212.920456,196.093170 
		  C208.560730,192.469086 204.534576,188.990356 200.328384,185.744949 
		  C198.577072,184.393661 197.671646,182.931000 197.678894,180.733170 
		  C197.718460,168.742935 197.698212,156.752487 197.733063,144.762238 
		  C197.735275,143.997650 198.028091,143.233932 198.397156,141.444916 
		  C204.153427,146.132172 209.357056,150.359070 214.548035,154.601456 
		  C216.602127,156.280197 218.600861,158.027405 220.672089,159.684357 
		  C226.505280,164.350845 226.559967,164.392502 232.234283,159.642395 
		  C249.557236,145.140961 266.824799,130.573318 284.156616,116.082520 
		  C287.695862,113.123451 291.420959,110.386726 295.076599,107.534866 
		  C297.054352,109.118973 296.298737,111.089378 296.300323,112.772568 
		  C296.343445,158.403519 296.336456,204.034546 296.322968,249.665543 
		  C296.321014,256.245117 296.285919,256.260620 289.674835,256.276245 
		  C283.179932,256.291626 276.684906,256.291107 270.190094,256.260681 
		  C263.679657,256.230194 263.657318,256.210205 263.653656,249.482132 
		  C263.641418,227.166245 263.646820,204.850342 263.645508,182.534454 
		  C263.645416,180.770508 263.645477,179.006546 263.645477,176.103516 
		  C256.191711,182.226151 249.688004,187.513290 243.247726,192.876602 
		  C238.399017,196.914474 233.565750,200.976181 228.859055,205.176773 
		  C226.853333,206.966827 225.273376,207.085693 223.277222,205.229828 
		  C219.993256,202.176636 216.554749,199.289673 212.920456,196.093170 
		z"/>
		<path id="front"
		  d="
		M223.000031,222.753235 
		  C231.163513,222.760834 238.830032,222.899429 246.489136,222.720245 
		  C250.204224,222.633347 251.475647,224.071350 251.393463,227.708649 
		  C251.212906,235.701294 251.213440,243.703110 251.379410,251.696198 
		  C251.453049,255.242493 249.961639,256.314636 246.621109,256.306580 
		  C217.966583,256.237549 189.311676,256.228882 160.657242,256.314819 
		  C156.966827,256.325897 155.687225,254.869781 155.692200,251.275955 
		  C155.756973,204.462234 155.738388,157.648392 155.751312,110.834587 
		  C155.751617,109.710770 155.613861,108.519203 156.354950,107.683830 
		  C157.940048,107.134033 158.812973,108.044693 159.622696,108.819550 
		  C167.683380,116.533127 176.722427,123.075439 185.241470,130.239349 
		  C188.132080,132.670151 189.361847,135.466431 189.340775,139.333572 
		  C189.201035,164.988770 189.385086,190.646133 189.160995,216.300156 
		  C189.118057,221.214798 190.278534,223.119659 195.517075,222.876801 
		  C204.493988,222.460617 213.503952,222.756577 223.000031,222.753235 
		z"/>
	  </svg>
</div>
<!-- @csrf 
@foreach($websites as $website)
<a href="{{ $website->github }}" class="float">
	<div class="sign"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
		<g fill="currentColor" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M17.791,46.836c0.711,-0.306 1.209,-1.013 1.209,-1.836v-5.4c0,-0.197 0.016,-0.402 0.041,-0.61c-0.014,0.004 -0.027,0.007 -0.041,0.01c0,0 -3,0 -3.6,0c-1.5,0 -2.8,-0.6 -3.4,-1.8c-0.7,-1.3 -1,-3.5 -2.8,-4.7c-0.3,-0.2 -0.1,-0.5 0.5,-0.5c0.6,0.1 1.9,0.9 2.7,2c0.9,1.1 1.8,2 3.4,2c2.487,0 3.82,-0.125 4.622,-0.555c0.934,-1.389 2.227,-2.445 3.578,-2.445v-0.025c-5.668,-0.182 -9.289,-2.066 -10.975,-4.975c-3.665,0.042 -6.856,0.405 -8.677,0.707c-0.058,-0.327 -0.108,-0.656 -0.151,-0.987c1.797,-0.296 4.843,-0.647 8.345,-0.714c-0.112,-0.276 -0.209,-0.559 -0.291,-0.849c-3.511,-0.178 -6.541,-0.039 -8.187,0.097c-0.02,-0.332 -0.047,-0.663 -0.051,-0.999c1.649,-0.135 4.597,-0.27 8.018,-0.111c-0.079,-0.5 -0.13,-1.011 -0.13,-1.543c0,-1.7 0.6,-3.5 1.7,-5c-0.5,-1.7 -1.2,-5.3 0.2,-6.6c2.7,0 4.6,1.3 5.5,2.1c1.699,-0.701 3.599,-1.101 5.699,-1.101c2.1,0 4,0.4 5.6,1.1c0.9,-0.8 2.8,-2.1 5.5,-2.1c1.5,1.4 0.7,5 0.2,6.6c1.1,1.5 1.7,3.2 1.6,5c0,0.484 -0.045,0.951 -0.11,1.409c3.499,-0.172 6.527,-0.034 8.204,0.102c-0.002,0.337 -0.033,0.666 -0.051,0.999c-1.671,-0.138 -4.775,-0.28 -8.359,-0.089c-0.089,0.336 -0.197,0.663 -0.325,0.98c3.546,0.046 6.665,0.389 8.548,0.689c-0.043,0.332 -0.093,0.661 -0.151,0.987c-1.912,-0.306 -5.171,-0.664 -8.879,-0.682c-1.665,2.878 -5.22,4.755 -10.777,4.974v0.031c2.6,0 5,3.9 5,6.6v5.4c0,0.823 0.498,1.53 1.209,1.836c9.161,-3.032 15.791,-11.672 15.791,-21.836c0,-12.682 -10.317,-23 -23,-23c-12.683,0 -23,10.318 -23,23c0,10.164 6.63,18.804 15.791,21.836z"></path></g></g>
	</svg></div>
	<div class="text-float">Github</div>
</a>
@endforeach -->
@endsection 