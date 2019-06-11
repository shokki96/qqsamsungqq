<footer class="container-fluid">
    <div class="row">
        <div class="footer-top container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <ul>
                        @foreach($topMenus as $menu)
                            <li><a href="{{route('menuLinkWeb', $menu->id)}}" class = "fontRegular">{{ $menu->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <ul>
                        <li><a href="">Göni ýaylym</a></li>
                        <li><a href="">Altyn Asyr</a></li>
                        <li><a href="">Aşgabat</a></li>
                        <li><a href="">Miras</a></li>
                        <li><a href="">Türkmen owazy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <ul>
                        <li><a href="">Türkmenistan Sport</a></li>
                        <li><a href="">Türkmenistan</a></li>
                        <li><a href="">Ýaşlyk</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <ul>
                        <li><a href="">Русский</a></li>
                        <li><a href="">English</a></li>
                        <li><a href="">Türkmen</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <span onclick="topFunction()" id="myBtn" title="Go to top" class="go-top" style="display: none;">
            <svg viewBox="0 0 32 32">
                <g fill="#ace0e0">
                    <path d="M16 0C7.16 0 0 7.16 0 16s7.16 16 16 16 16-7.16 16-16S24.84 0 16 0zm0 30C8.28 30 1.97 23.72 1.97 16S8.27 2 16 2c7.72 0 14 6.28 14 14s-6.28 14-14 14z"></path>
                    <path d="M16.7 11.3c-.38-.4-1.04-.4-1.43 0l-7 6.9c-.4.38-.4 1.02 0 1.4.4.4 1.04.4 1.43 0l6.3-6.2 6.27 6.2c.4.4 1.03.4 1.43 0 .4-.38.4-1.02 0-1.4l-7-6.9z"></path>
                </g>
            </svg>
        </span>

        <div class="footer-bottom text-center">
            <div id="theme-credits" class="text-center">
                <br><br>
                <a href="http://info.flagcounter.com/yIxW">
                    <img src="http://s01.flagcounter.com/count2/yIxW/bg_FFFFFF/txt_000000/border_CCCCCC/columns_8/maxflags_12/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0">
                </a>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('static/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }



    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myDropdownFunc() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }

    jQuery(document).ready(function (e) {
        function t(t) {
            e(t).bind("click", function (t) {
                t.preventDefault();
                e(this).parent().fadeOut()
            })
        }
        e(".dropdown-toggle").click(function () {
            var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(":hidden");
            e(".button-dropdown .dropdown-menu").hide();
            e(".button-dropdown .dropdown-toggle").removeClass("activee");
            e(".button-dropdown").css('background-color', '#187f7e');
            e(".button-dropdown .dropdown-toggle *").css('color', '#ffffff');
            if (t) {
                e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").children(".dropdown-toggle").addClass("activee");
                e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").css('background-color', '#ffffff');
                e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").children(".dropdown-toggle").children("*").css('color', '#187f7e');
            }
        });
        e(document).bind("click", function (t) {
            var n = e(t.target);
            if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu").hide();
        });
        e(document).bind("click", function (t) {
            var n = e(t.target);
            if (!n.parents().hasClass("button-dropdown")) {
                e(".button-dropdown .dropdown-toggle").removeClass("activee");
                e(".button-dropdown").css('background-color', '#187f7e');
                e(".button-dropdown .dropdown-toggle *").css('color', '#ffffff');
            }
        })
    });
</script>
@yield('footerScripts')
</body>
</html>