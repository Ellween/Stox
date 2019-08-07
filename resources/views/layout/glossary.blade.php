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
                        <div class="single-item" style ='position:relative' >
                            @if($glossary->title[0] != $first_letter)
                                <?php $first_letter = $glossary->title[0]; ?>
                                <h1  style ='position: absolute; top: -50px; left: -70px;color: #F24823;' >{{ $first_letter }} </h1>
                            @endif
                            <h4>{{ $glossary->title }}</h4>
                            <p>- {{ $glossary->text }} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection 