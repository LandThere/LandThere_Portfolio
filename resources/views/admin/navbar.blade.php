<div class="sidebar">
  <div class="logo-details">
    <img src="{{ asset('asset/images/21323.png') }}" alt="profileImg">
      <div class="logo_name">LandThere</div>
      <i class='bx bx-menu' id="btn" ></i>
  </div>
  <ul class="nav-list">
    <li>
      <a href="{{ route('WebsiteName.show') }}">
        <i class='bx bx-info-circle'></i>
        <span class="links_name">Socials</span>
      </a>
       <span class="tooltip">Socials</span>
    </li>
    <li>
     <a href="{{ route('about.show') }}">
       <i class='bx bx-user' ></i>
       <span class="links_name">About</span>
     </a>
     <span class="tooltip">About</span>
   </li>
   <li>
    <a href="{{ route('timeline.show') }}">
      <i class='bx bx-list-check'></i>
      <span class="links_name">Timeline</span>
    </a>
     <span class="tooltip">Timeline</span>
  </li>
  <li>
   <a href="{{ route('experience.show') }}">
    <i class='bx bxs-file-html'></i>
     <span class="links_name">Experience</span>
   </a>
   <span class="tooltip">Experience</span>
 </li>
 <li>
  <a href="{{ route('skill.show') }}">
    <i class='bx bx-menu'></i>
    <span class="links_name">Skills</span>
  </a>
   <span class="tooltip">Skills</span>
</li>
<li>
 <a href="{{ route('work.show') }}">
  <i class='bx bxs-graduation'></i>
   <span class="links_name">Work</span>
 </a>
 <span class="tooltip">Work</span>
</li>
<li>
  <a href="{{ route('user.show') }}">
    <i class='bx bx-user' ></i>
    <span class="links_name">User</span>
  </a>
  <span class="tooltip">User</span>
</li>
   <li class="profile">
    <a href="{{ route ('logout')}}">
       <div class="profile-details">
        <img src="{{ asset('asset/images/user-1.jpg') }}" alt="profileImg" style="height: 40px">
         <div class="name_job">
           {{-- <div class="name">Prem Shahi</div>
           <div class="job">Web designer</div> --}}
         </div>
       </div>
       <i class='bx bx-log-out' id="log_out" ></i>
    </a>
   </li>
  </ul>
</div>