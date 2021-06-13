@extends('dashboard/user/home')

@section('title', 'Cart')

@section('content')

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Course</th>
            <th style="width:10%">Price</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        <?php $total += $details['cprice']?>
        <tr>
            <td data-th="Course">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{asset('imgs')}}/{{ $details['image_path'] }}"
                            width="100" height="100" class="img-responsive" /></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['cname'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">${{ $details['cprice'] }}</td>
            <td data-th="Subtotal" class="text-center">${{ $details['cprice']}}</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                        class="fa fa-trash-o"></i></button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ route('user.courses') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
    </tfoot>
</table>

@endsection

@section('scripts')
<script type="text/javascript">
    $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('/cart/remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', cid: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
</script>
@endsection