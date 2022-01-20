@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<?php
if(\Session::has('error')){
    $message = \Session::get('error');
    echo "<script type='text/javascript'>alert('$message');</script>";
}elseif (\Session::has('success')){
    $message = \Session::get('success');
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

