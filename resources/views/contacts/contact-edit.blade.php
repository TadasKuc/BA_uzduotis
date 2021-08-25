<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="section-heading">
                            <h2>Redaguoti</h2>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form id="contact" action="{{route('contacts.update', ['contact' => $id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @error('name')
                                    <p class="" style="color:red">{{ $errors->first('name') }}</p>
                                    @enderror
                                    <fieldset>
                                        <input name="name"
                                               type="text"
                                               class="form-control"
                                               id="name"
                                               placeholder="Varadas"
                                               required=""
                                               value="{{$name}}">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @error('surname')
                                    <p class="" style="color:red">{{ $errors->first('surname') }}</p>
                                    @enderror
                                    <fieldset>
                                        <input name="surname"
                                               type="text"
                                               class="form-control"
                                               id="surname"
                                               placeholder="Pavardė"
                                               required=""
                                               value="{{$surname}}">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @error('phone')
                                    <p class="" style="color:red">{{ $errors->first('phone') }}</p>
                                    @enderror
                                    <fieldset>
                                        <input name="phone"
                                               type="number"
                                               class="form-control"
                                               id="phone"
                                               placeholder="Numeris"
                                               required=""
                                               value="{{$phone}}">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @error('description')
                                    <p class="" style="color:red">{{ $errors->first('description') }}</p>
                                    @enderror
                                    <fieldset>
                                        <input name="description"
                                               type="text"
                                               class="form-control"
                                               id="description"
                                               placeholder="Aprasymas"
                                               required=""
                                               value="{{$description}}">
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="filled-button">Kurti</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
