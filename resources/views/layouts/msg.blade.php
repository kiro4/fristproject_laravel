{{-- رسالة النجاح --}}
@if (session()->has("success"))
    <div class="alert alert-success" id="success-message">
        {{ session()->get("success") }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 3000);  // 5000 مللي ثانية (5 ثواني) قبل أن تختفي الرسالة
    </script>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif