<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Kontaktu sarasas</h2>
                        </div>
                    </div>
                    <table class="table" style="width: 80%">
                        <tr>
                            <th>Vardas</th>
                            <th>Pavarde</th>
                            <th>Tel nr</th>
                            <th>Aprasymas</th>
                            <th> </th>

                                <th>Edit</th>
                                <th>X</th>
                        </tr>

                        @foreach($contacts as $contact)
                            <tr class="">
                                <td><a href="">{{$contact->name}} </a></td>
                                <td>{{$contact->surname}} </td>
                                <td>{{$contact->phone}} </td>
                                <td>{{$contact->description}} </td>
                                <td>
                                    <form action="{{ route('share.store' , ['contact' => $contact->id]) }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <select name="user_to_phone" class="form-control" id="user_to_phone"  required="">
                                                <option ></option>
                                                @foreach($activeContacts as $active)
                                                    <option value="{{$active->phone}}">{{$active->name . '-' . $active->surname}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                        <input class="btn btn-outline-danger" type="Submit" value="siusti">
                                    </form>
                                </td>

                                    <td><a class="btn btn-outline-warning" href="{{ route('contacts.edit', $contact->id) }}" style="color:blue">Redaguoti</a> </td>
                                    <td>
                                        <form action="{{ route('contacts.destroy' , ['contact' => $contact->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input class="btn btn-outline-danger" type="Submit" value="Trinti">
                                        </form>
                                    </td>

                            </tr>

                        @endforeach

                    </table>


                    <table class="table" style="width: 80%">
                        <tr>
                            <th>Vardas</th>
                            <th>Pavarde</th>
                            <th>Tel nr</th>
                            <th>Aprasymas</th>
                            <th> </th>

                            <th>Edit</th>
                            <th>X</th>
                        </tr>
shared contacts
                        @foreach($test as $contact)
                            <tr class="">
                                <td><a href="">{{$contact->name}} </a></td>
                                <td>{{$contact->surname}} </td>
                                <td>{{$contact->phone}} </td>
                                <td>{{$contact->description}} </td>
                                <td>
                                    <form action="{{ route('share.store' , ['contact' => $contact->id]) }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <select name="user_to_phone" class="form-control" id="user_to_phone"  required="">
                                                <option ></option>
                                                @foreach($activeContacts as $active)
                                                    <option value="{{$active->phone}}">{{$active->name . '-' . $active->surname}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                        <input class="btn btn-outline-danger" type="Submit" value="siusti">
                                    </form>
                                </td>

                                <td><a class="btn btn-outline-warning" href="{{ route('contacts.edit', $contact->id) }}" style="color:blue">Redaguoti</a> </td>
                                <td>
                                    <form action="{{ route('contacts.destroy' , ['contact' => $contact->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-outline-danger" type="Submit" value="Trinti">
                                    </form>
                                </td>

                            </tr>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

