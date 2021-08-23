<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                     <div class="card col-lg-12 col-md-12 col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title">{{$contact->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$contact->surname}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$contact->phone}}</h6>
                            <p class="card-text">{{$contact->description}}</p>
                            <div style="display: flex;">
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="card-link btn btn-info mr-1">Redaguoti</a>
                                <form action="{{ route('contacts.destroy' , ['contact' => $contact->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input class="card-link btn btn-danger" type="Submit" value="Trinti kontaktą">
                                </form>
                            </div>
                        </div>
                         <form action="{{ route('share.store' , ['contact' => $contact->id]) }}" method="POST">
                             @csrf
                             <fieldset>
                                 <select name="user_to_phone" class="form-control" id="user_to_phone"  required="">
                                     <option>Dalintis kontatku su...</option>
                                     @foreach($activeContacts as $active)
                                         <option value="{{$active->phone}}">{{$active->name . '-' . $active->surname}}</option>
                                     @endforeach
                                 </select>
                             </fieldset>
                             <input class="btn btn-outline-info mb-3 mt-1" type="Submit" value="Dalintis kontaktu">
                         </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

