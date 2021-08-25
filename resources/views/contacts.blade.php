<x-app-layout>
    <x-slot name="header">
        <a href="{{route('contacts.create')}}">Pridėti</a>
        <a href="{{route('contacts.create')}}">Pridėti</a>
        <a href="{{route('contacts.create')}}">Pridėti</a>

    </x-slot>
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Kontaktų sąrašas</h2>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas</th>
                            <th scope="col">Pavarde</th>
                            <th scope="col">Tel nr</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $key => $contact)
                            <a href="{{ route('contacts.show' , ['contact' => $contact]) }}">
                            <tr>

                                <th scope="row">{{$key+1}}</th>
                                <td><a href="{{ route('contacts.show' , ['contact' => $contact]) }}">{{$contact->name}}</a></td>
                                <td>{{$contact->surname}}</td>
                                <td>{{$contact->phone}}</td>

                            </tr>
                            </a>

                        @endforeach
                        </tbody>
                    </table>
                    <br>

                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Gauti kontaktai</h2>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas</th>
                            <th scope="col">Pavarde</th>
                            <th scope="col">Tel nr</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sharedContacts as $key => $sharedcontact)
                                <tr>

                                    <th scope="row">{{$key+1}}</th>
                                    <td><a href="{{ route('contacts.show' , ['contact' => $sharedcontact, 'youShared' => false]) }}">{{$sharedcontact->name}}</a></td>
                                    <td>{{$sharedcontact->surname}}</td>
                                    <td>{{$sharedcontact->phone}}</td>

                                </tr>


                        @endforeach
                        </tbody>
                    </table>
                    <br>

                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Išsiųsti kontaktai</h2>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas</th>
                            <th scope="col">Pavarde</th>
                            <th scope="col">Tel nr</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contactsYouShared as $key => $contactYouShared)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td><a href="{{ route('contacts.show' , ['contact' => $contactYouShared->id,'youShared' => true ]) }}">{{$contactYouShared->name}}</a></td>
                                        <td>{{$contactYouShared->surname}}</td>
                                        <td>{{$contactYouShared->phone}}</td>
                                    </tr>
                                </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

