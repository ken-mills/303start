<!DOCTYPE html>
<html lang="en">
<head>

    @include('partials.head')

    <link rel="stylesheet" href="{{asset('css/default.css')}}">


    <script>
        $(document).ready(function () {
            $(".btn-303").click(function (e) {
                $(".btn-303").addClass('btn-default').removeClass('btn-primary');
                $(this).addClass('btn-primary').removeClass('btn-default');
                $(".popup303 p").hide();
                var str = e.target.id;
                var para_num =  str.substring(3);
                var target_id = "#pp" + para_num;
                $(target_id).fadeIn("slow");
            });
        });
    </script>

</head>

<body>

<!-- Navigation -->
<!-- Navigation -->
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            <a href="#top" onclick=$("#menu-close").click();>303start.com</a>
        </li>
        <li>
            <a href="#top" onclick=$("#menu-close").click();>home</a>
        </li>
        <li>
            <a href="#services" onclick=$("#menu-close").click();>team303</a>
        </li>
        <li>
            <a href="#features" onclick=$("#menu-close").click();>features</a>
        </li>
        <li>
            <a href="#news" onclick=$("#menu-close").click();>news</a>
        </li>
        <li>
            <a href="#contact" onclick=$("#menu-close").click();>about</a>
        </li>
    </ul>
</nav>
<header id="top" class="top-image fill home text-center">
    <img src="{{asset('images/303startNoTag.png')}}" class="img-responsive img-rounded center-block">
    <h2 class="tag-line">providing a framework and software to engage employees and teams</h2>
</header>

<!-- Services -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<div id="services" class="container-fluid bg-primary fill">
    <div class="row text-center">
            <h2>team303</h2>
            <div class="row" style="max-height: 20%">
                <div class="col-xs-12 col-sm-3">
                    <img id="crelat1" src="images/connectgreen.jpg" class="img-responsive img-circle center-block icon-303">
                    <h4>relationships</h4>
                    <div class="btn-spacing">
                        <button id="btn1" class="btn btn-303 btn-default">learn more</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <img id="csimple1" src="images/treeb.jpg" class="img-responsive img-circle center-block icon-303" >
                    <h4>simplicity</h4>
                    <div class="btn-spacing">
                        <button id="btn2" class="btn btn-303 btn-default">learn more</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <img id="cfun1" src="images/fireworkgreen.jpg" class="img-responsive img-circle center-block icon-303">
                    <h4>fun</h4>
                    <div class="btn-spacing">
                        <button id="btn3" class="btn btn-303 btn-default">learn more</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <img id="cgears1" src="images/geargreen.jpg" class="img-responsive img-circle center-block icon-303">
                    <h4>customizable</h4>
                    <div class="btn-spacing">
                        <button id="btn4" class="btn btn-303 btn-default">learn more</button>
                    </div>
                </div>
            </div>
            <!-- /.row (nested) -->
    </div>
    <!-- /.row -->
    <div class="row text-center">
        <div class="col-xs-12 col-sm-12">
            <div class="popup303" title="Principles">
                <!-- Relationships -->
                <p id="pp1">
                    a foundation for creating an excellent company is an investment in people. knowledge, skills, and
                    attitude are important competencies to develop and monitor. team303 does that but organizations
                    often forget to invest in and nurture the relationships between people, between supervisors and
                    employees, between executives and managers, or between coaches and players. the team303 design was based on
                    this core principle. team303 provides tools to develop strong, transparent, mentoring relationships
                    between people.
                    </p>
                <!-- Simplicity -->
                <p id="pp2">
                    organizations everywhere including many in the Fortune 500 have decided to trash their bureaucratic,
                    paper based, time sucking, performance managements systems. why? organizations are moving too fast.
                    these systems were designed for a different era. many organizations are now simply asking their
                    managers and supervisors to meet with staff more frequently, communicate more, and create more time
                    for mentoring but with what tools? how do your leaders know this is actually happening? team303
                    provides the toolbox to help supervisors engage with their teams. team303 provides your organization's leaders with a window
                    into how their employees are engaging, in light, fun, and non-threatening ways.
                    </p>
                <!-- Fun -->
                <p id="pp3">
                    team303 provides an optional player/coach metaphor to take the work out of the language used to engage players.
                    team303 allows players and coaches to become a "pro" at engaging using a
                    point system. you can customize the scoring.
                    </p>
                <p id="pp4">
                    team303 has optional components that allow your organization to select and customize an employee
                    engagement system that fits your culture. you decide which components and features are right for
                    your organization.
                    </p>
            </div>
        </div>
    </div>

</div>


<div id="features" class="container-fluid table-303 fill">
    <h2 class="text-primary" style="text-align: center">team303 components and features</h2>

    <div class="row">
    <div class="col-sm-12">
    <div class="table-responsive">

    <table class="table" align="center" summary="List of team303 components and features">
        <tbody>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-eye fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>pre-game</strong></td>
                <td style="vertical-align:middle">
                the pre-game provides coaches and players with a template agenda for a meeting at the
                beginning of the engagement period. you define when that period starts and ends for your organization.
                the pregame is a set of simple questions that focus on how both can work together more
                effectively. you can customize the template for your organization. players capture notes to prepare for the
                meeting.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-futbol-o fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>winning</strong></td>
                <td>
                    a simple way to capture player goals. use this tool to promote transparent communication and discussion.
                pre-set character limits and instructions that you can customize. no paper forms.

                </td>
            </tr>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-graduation-cap fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>training camp</strong></td>
                <td>
                    identify and record player training goals to help your organization build an inventory of knowledge and skills.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-calendar-check-o fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>huddle</strong></td>
                <td>
                    quickly document results of frequent discussions. how are we working together? how are you
                    progressing toward your organizational and training goals? what can you do to improve effectiveness?
                    what is in your way?
                    document discussions for improvement or new ideas. don't wait until the end of the year to find out when its too late.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-lightbulb-o fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>ideas</strong></td>
                <td>
                innovative ideas can be nurtured in more than just a suggestion box.  players like to know their ideas
                are being heard and shared. players need to understand the steps required to make new product ideas a
                reality. this tool provides a simple framework for vetting and supporting ideas within your
                organization.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-comments fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>the wave</strong></td>
                <td>
                reward your players for engaging. the wave generates a stream of player activity like a log file and a badge
                system that promotes engagement, communication, and player development. visualize in real-time how players
                are engaging. use the data to enhance your own player engagement programs.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:middle"><i class="fa fa-list fa-3x text-primary"></i></td>
                <td style="vertical-align:middle" class="wider"><strong>scorecard</strong></td>
                <td>
                you just killed your old performance management system but your team leader still wants information, who is
                talking? who is growing? review an inventory of organizational skills, skills being developed. see how players are
                engaging.
                </td>
            </tr>

        </tbody>

    </table>



    </div>
    </div>
    </div>

</div>


<div id="news" class="call-out" style="background-image: url('{{ asset('images/CycleRoad1080.jpg')}}')">
    <div class="text-vertical-center news">
        <h2>team303 release coming soon<br>want to learn more? call 484.886.4263 </h2>
        @include('partials.mailinglist')
    </div>
</div>

<div id="contact" class="container-fluid fill">

    <div id="bio" class="row">
        <div class="col-xs-12 col-md-4">
            <div id="circle2" class="circle2" style="background-image: url('{{ asset('images/img5524a2.jpg')}}')"></div>
        </div>

        <div class="col-xs-12 col-md-8">

            <h2 class="text-primary">about 303start</h2>

            <p>
                303start is the home of team303. team303 was created with the goal of making performance management
                easier. many organizations want the same thing. team303 has evolved into more than just a performance
                management tool. it is an alternative resource for supervisors, managers, and leaders to engage
                contributors in today’s workplace. team303 helps to build strong relationships between players and coaches.
            </p>
            <p>
                303start will provide the team303 software as a cloud service. some write books, 303start writes software.
                            </p>

        </div>
    </div>

    @include('partials.footer')

</div>


<script>
    // Closes the sidebar menu
    $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function () {
        $("a[href*='#']:not([href='#'])").click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
@include('partials.google')
</body>
</html>
