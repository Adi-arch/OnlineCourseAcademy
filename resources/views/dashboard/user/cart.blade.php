@extends('dashboard/user/parent')



@section('content')
<div class=" container fluid">
<div class="col-md text-center">
<h3>CART</h3>
</div>
<table id="cart" class="table table-hover table-condensed border">
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
        @foreach ($carts as $cart)
        <?php $total += $cart->course_price?>
        <tr>
            <td data-th="Course">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{asset('imgs')}}/{{ $cart->course_image}}" width="100"
                            height="100" class="img-responsive" /></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $cart->course_name }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">${{ $cart->course_price }}</td>
            <td data-th="Subtotal" class="text-center">${{ $cart->course_price }}</td>
            <td class="actions" data-th="">
                {{-- <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                    class="fa fa-trash-o"></i></button> --}}
            </td>
        </tr>
        @endforeach

    </tbody>
    <tfoot>

        <tr>
            <td><a href="{{ route('user.courses') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
    </tfoot>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-info" onclick="openForm()"> <a class="check text-white text-decoration-none"
            href="{{route('user.checkOut')}}">Checkout</a></button>
</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
    $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('/cart/remove-from-cart') }}',
                    method: " DELETE", data: {_token: '{{ csrf_token() }}' , cid: ele.attr("data-id")}, success:
            function (response) { window.location.reload(); } }); } }); 
</script>
<script>
    function openForm() {
            document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
</script>
@endsection