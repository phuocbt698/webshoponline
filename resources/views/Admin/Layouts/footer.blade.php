<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>June13</b>
    </div>
    <div>
      <a href="https://www.facebook.com/phuocbt698" class="mr-2">
        <i class="fab fa-facebook"></i>
        <strong>BÙI THẾ PHƯỚC</strong>
      </a>
      <a href="https://github.com/phuocbt698">
        <i class="fab fa-github"></i>
        <strong>BÙI THẾ PHƯỚC</strong>
      </a>
    </div>
   
  </footer>
  @if (Session::has('messeage'))
  <script>
      toastMessage('{{Session::get('messeage')}}');
  </script>
  @endif