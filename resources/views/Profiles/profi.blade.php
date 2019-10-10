@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/avatars/{{ $user->user}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25%;">
            <h2>{{ $user->name}}'s Profile</h2>
           

                                
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
