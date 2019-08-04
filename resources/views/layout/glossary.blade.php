@extends('base')

@section('content')
    <div class='main-content-head'>
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
    </div>
    <div class="container" style ='max-width:1263px'>
        <div class="row">
            <div class="glossary-detail">
                <div class="partners-head">
                    <h1>Glossary</h1>
                </div>
                <div class="glossary_search">
                    <input id='search' type="text" class='' placeholder="Search Keyword...">
                    <img src="/images/search.svg" alt="">
                </div>
                <div class="glossary_items">
                    @foreach ($glossaries as $glossary)
                        <div class="single-item">
                            <h4>{{ $glossary->title }}</h4>
                            <p>- {{ $glossary->text }} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection 