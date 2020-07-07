@extends('layout')

@section('content')
    <section id="one" class="wrapper style2">
        <div class="inner">
            <h2 class="title">Enquiries</h2>
            @foreach ($enquiries as $item)
                <table>
                    {{-- <tr>ID</tr> --}}
                    <tr></tr>
                </table>
            @endforeach
        </div>
    </section>
@endsection
