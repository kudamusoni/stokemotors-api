@extends('layout')

@section('content')
    <section id="one" class="wrapper style2">
        <div class="inner">
            <h2 style="text-decoration: underline; color: #202839">All Vehicles</h2>
            <div class="grid-style">
                @foreach ($vehicles as $item)
                    <div>
                        <div class="box" style="height: 100%">
                            <div class="image fit">
                                <img src="{{ $item['main_image']['url'] }}" alt="" />
                            </div>
                            <div class="content">
                                <header class="align-center">
                                    <p>mattis elementum sapien pretium tellus</p>
                                    <h2 style="height: 70px">{{
                                        $item['make']['name'] . " " .
                                        $item['model']['name'] . " " .
                                        $item['edition']['name']
                                    }}</h2>
                                </header>
                                <p style="overflow: hidden; height:85px">
                                    Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis.
                                    Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum.
                                    Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.
                                </p>
                                <footer class="align-center">
                                    <a href="/vehicles/info/{{ $item['id']}}" class="button alt">Learn More</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3>
                {{ $vehicles->links("pagination::bootstrap-4") }}
            </h3>
        </div>
    </section>
@endsection
