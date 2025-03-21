@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova galeria</div>
                <div class="card-body">
                    <form action="{{ route('galleryStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title">title</label>
                                <input type="text" name="title" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="cover">cover</label>
                                <input type="file" name="cover" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                            <label for="description">Descrição</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                           </div>
                        </div>
                        <button class="btn btn-primary">GO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
