  <footer class="footer footer-black  footer-white ">
      <div class="container">
        <div class="row">
          <nav class="footer-nav">
            <ul>
              @foreach($pages as $page)
                <li>
                  <a href="/page/{{ $page->id }}/{{ trim(strtolower(str_replace(' ', '-', $page->name))) }}" target="_blank">{{ $page->name }}</a>
                </li>
              @endforeach
             
            </ul>
          </nav>
          <div class="credits ml-auto">
            <span class="copyright">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
            </span>
          </div>
        </div>
      </div>
    </footer>