@extends('layouts/base_view')
@section('title','Data Transaksi')
@section('content')
<!-- Main content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Buat transaksi baru</h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('transactions.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6 form-group form-floating mb-3">
                                    <select class="form-control" name="room_id" id="roomID" required>
                                        <option value="">Pilih Kamar</option>
                                        @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="">Pilih Kamar</label>
                                    @if ($errors->has('room_id'))
                                    <span class="text-danger text-left">{{ $errors->first('room_id') }}</span>
                                    @endif
                                </div>

                                <div class="col-2 form-group form-floating mb-3">
                                    <input value="{{ old('price') }}" type="price" class="form-control prices" name="price" placeholder="Harga Perbulan" required>
                                    <label for="price">Harga Perbulan</label>
                                    @if ($errors->has('price'))
                                    <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <div class="col-2 form-group form-floating mb-3">
                                    <input value="{{ old('discount') }}" type="discount" class="form-control prices" name="discount" placeholder="Diskon">
                                    <label for="discount">Diskon</label>
                                    @if ($errors->has('discount'))
                                    <span class="text-danger text-left">{{ $errors->first('discount') }}</span>
                                    @endif
                                </div>
                                <div class="col-2 form-group form-floating mb-3">
                                    <input value="{{ old('total') }}" type="total" class="form-control prices" name="total" placeholder="Total" required>
                                    <label for="total">Total</label>
                                    @if ($errors->has('total'))
                                    <span class="text-danger text-left">{{ $errors->first('total') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 form-group form-floating mb-3">
                                    <input value="{{ old('customer_name') }}" type="text" class="form-control" name="customer_name" placeholder="Nama Penghuni" required>
                                    <label for="customer_name">Nama Penghuni</label>
                                    @if ($errors->has('customer_name'))
                                    <span class="text-danger text-left">{{ $errors->first('customer_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-3 form-group form-floating mb-3">
                                    <input value="{{ old('customer_phone') }}" type="text" class="form-control" name="customer_phone" placeholder="No Telp" required>
                                    <label for="customer_phone">No Telp</label>
                                    @if ($errors->has('customer_phone'))
                                    <span class="text-danger text-left">{{ $errors->first('customer_phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-6 form-group form-floating mb-3">
                                    <textarea value="{{ old('note') }}" type="text" class="form-control" name="note" placeholder="Catatan" rows="3"></textarea>

                                    <label for="note">Catatan</label>
                                    @if ($errors->has('note'))
                                    <span class="text-danger text-left">{{ $errors->first('note') }}</span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            <a href="{{ route('transactions.index') }}" class="btn btn-default">Kembali</a>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script>
    var format = function(num) {
        if (num.trim() != 'Rp') {
            var str = num.toString().replace("Rp ", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(",") > 0) {
                parts = str.split(",");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ".") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(".");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            if (formatted) {
                return ('Rp ' + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
            }
        }
    };

    $(".prices").keypress((e) => {
        var charCode = (e.which) ? e.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });

    $('.prices').keyup(function(e) {
        $(this).val(format($(this).val()));
    });

    $('.prices').blur(function() {
        totale();
    });

    $("#roomID").change(function() {
        if ($(this).val()) {

            var url = "{{ url('/transactions/getRoom') }}";
            url += '/' + $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                cache: false,
                type: 'GET',
                dataType: 'json',
                contentType: "application/json; charset=utf-8",
                success: function(result) {
                    console.log(result);
                    if (result.msg != "Error") {

                        $("input[name='price']").val(result.data.price);
                        $("input[name='discount']").val(0);
                        $(".prices").trigger("keyup");
                        totale();

                    }

                }
            });
        } else {
            $("input[name='price']").val(null);
            $("input[name='price']").trigger("keyup");
            totale();
        }
    });

    function totale() {
        // ini untuk totall
        var price = ($("input[name='price']").val().replace(/\D/g, "")) ? $("input[name='price']").val().replace(/\D/g, "") : 0;
        var discount = ($("input[name='discount']").val().replace(/\D/g, "")) ? $("input[name='discount']").val().replace(/\D/g, "") : 0;
        var total = price;

        if (parseInt(discount) <= parseInt(price)) {
            total = parseInt(price) - parseInt(discount);
        } else {
            $('input[name="discount"]').val(null);
        }

        $('input[name="total"]').val(total);
        $(".prices").trigger("keyup");
    }
</script>
@endsection