@extends('layouts.base_view')

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="callout callout-success">
            <h4><p id="textWelcome"></p></h4>
        </div>
        <div class="row">
        
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
var i = 0;
var txt = 'Selamat datang {{$logged_name}}, selamat beraktifitas dan semoga harimu menyenangkan!                    ';
var speed = 150;
typeWriter();
function typeWriter() {
  if (i < txt.length) {
    document.getElementById("textWelcome").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }else{
  	i = 0;
  	document.getElementById("textWelcome").innerHTML = '';
    document.getElementById("textWelcome").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);     
  }
}

</script>

@endsection