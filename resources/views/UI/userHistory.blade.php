@extends('UI.master')
@section('content')

<div style="height: 100px">
</div>
<div class="container-fruid">

    @if ($bookings->isEmpty())
    <div style="height: 20px">
    </div>
      <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div style="height: 100px">
                </div>
              <div class="detail-box wtext" data-aos="fade-up" data-aos-duration="2000">
                <h1 class="wtext" data-aos="fade-up" data-aos-duration="2000" style="color: red">
                    သင်သည် မည်သည့် ၀န်ဆောင်မှုကိုမှ ရယူထားခြင်းမရှိသေးပါ
                </h1>

              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box" data-aos="flip-right" data-aos-delay="100" data-aos-duration="1500">
                  <img src="{{asset('vv/images/1.jpg')}}" alt="">
              </div>
            </div>
          </div>

      </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">၀န်ဆောင်မှုအမျိုးအစား</th>
                    <th scope="col">၀န်ဆောင်မှုပေးသူအမည်</th>
                    <th scope="col">၀န်ဆောင်မှုပေးသူ ဖုန်းနပါတ်</th>
                    <th scope="col">၀န်ဆောင်ခ</th>
                    <th scope="col">သင်ပေးထားသောလိပ်စာ</th>
                    <th scope="col">Service လိုချင်သောရက်</th>
                    <th scope="col">လုပ်ဆောင်မှု အခြေအနေ</th>
                </tr>
            </thead>
            <tbody>
                @php
                $offset = ($bookings->currentPage() - 1) * $bookings->perPage();
                @endphp
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <th scope="row">{{ $offset + $loop->iteration }}</th>
                        <td>{{$booking->post->category->name}}</td>
                        <td>{{$booking->post->user->name}}</td>
                        <td>{{$booking->post->user->phone}}</td>
                        <td>{{ $booking->post->price }}</td>

                        <td>{{ $booking->address }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($booking->status==='reject')
                            ၀န်ဆောင်မှုပေးသူကငြင်းထားပါသည်

                            @elseif ($booking->status==='comfirm')
                            ၀န်ဆောင်မှုပေးသူကလက်ခံပါသည်
                            @else
                            ၀န်ဆောင်မှုရယူရန်စောင့်ဆိုင်းနေသည်
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-center custom-pagination pagination">
                {{ $bookings->links() }}
            </div>
        </div>
    @endif

</div>

@endsection
