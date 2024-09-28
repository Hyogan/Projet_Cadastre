@extends('layouts.client')
@section('contenu_page')  
    <div class="page_demande">
        <h2>Mettez a jour vos informations</h2>
        <p class="prevention_asterisc">*** Tous les champs marqués avec l'astérix sont obligatoires ***</p>
        <div class="form">
        <form class="demande-form" method="POST" action="{{Route('demandes.update',$demande->id)}}">
            @csrf
            <div class="form-block">
                <p>Arrondissement <span class="asterisc">*</span></p>
                <input required type="text" value="{{old('arrondissement',$demande->arrondissement)}}" name="arrondissement" placeholder="Arrondissement"/>
                @error("arrondissement")
                    <p class="text-error">{{$message}}</p>
                @enderror  
            </div>
            <div class="form-block-inline">
                <div class="form-block">
                    <p>Departement <span class="asterisc">*</span></p>
                    <input required type="text" value="{{old('departement',$demande->departement)}}" name="departement" placeholder="Moungo"/>
                    @error("departement")
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-block">
                    <p>Localite <span class="asterisc">*</span></p>
                    <input required type="text" value="{{old('localite',$demande->localite)}}" name="localite" placeholder="Moungo"/>
                    @error("localite")
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-block-inline">
                <div class="form-block">
                    <p>Numero Titre foncier <span class="asterisc">*</span></p>
                    <input required type="number" value="{{old('numero_du_titre_foncier',$demande->numero_du_titre_foncier)}}" name="numero_du_titre_foncier" placeholder="numero du Titre Foncier"/>
                </div>
                @error("numero_du_titre_foncier")
                    <p class="text-error">{{$message}}</p>
                @enderror  
            </div>
            <div class="form-block">
                <p>superficie(mètres carrés - m<sup>2</sup>) <span class="asterisc">*</span></p>
                <input required type="text" value="{{old('$demande->superficie',$demande->superficie)}}" name="superficie" placeholder="1200"/>
                @error("superficie")
                    <p class="text-error">{{$message}}</p>
                @enderror  
            </div>
            <div class="form-block">
                <p>Objectif <span class="asterisc">*</span></p>
                <select required name="destination">
                    <option value="logement">logements</option>
                    <option value="infrastructures_publiques">infrastructures publiques</option>
                    <option value="lotissement">lotissement</option>
                </select>
                @error("destination")
                    <p class="text-error">{{$message}}</p>
                @enderror  
            </div>
            <div class="form-block">
                <p>Budget <span class="asterisc">*</span></p>
                <input required type="number" value="{{old('budget',$demande->budget)}}" name="budget" placeholder="budget"/>
                @error("budget")
                    <p class="text-error">{{$message}}</p>
                @enderror  
            </div>
            <button type="submit">Soumettre la demande</button>
        </form>
        </div>
    </div>

    <style>

        
        .page_demande {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 8% 0 0;
            margin: auto;
        }

        .prevention_asterisc,.asterisc {
            color: red;
        }

        form .form-block {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .page_demande h2 {
            font-size: 35px;
        }
        .form {
            background: #FFFFFF;
            max-width: 800px;
            margin: 0 auto 100px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            gap: 10px;
        }
        .form input,select {
            outline: 1;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        
        .form-block-inline {
            display: flex;
            align-items: center;

            width: 100%;
            gap: 10px;
        }
    </style>

@endsection