@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset( $customerrors ) &&  count($customerrors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>{{ $customerrors['head'] }}</strong>

        <br><br>

        <ul>
            @foreach ($customerrors['errors'] as $customerror)
                <li>{{ $customerror }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset( $customnotifications ) )
    <!-- Form Error List -->
    <div class="alert alert-success">
        <strong>{{ $customnotifications['head'] }}</strong>

        <br><br>

        <ul>
            @foreach ($customnotifications['notifications'] as $customnotification)
                <li>{{ $customnotification }}</li>
            @endforeach
        </ul>
    </div>
@endif