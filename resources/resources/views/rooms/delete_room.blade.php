@extends('layouts.main')
@section('delete_room')
    
<main class="delete-item layout">
    <div class="container">
        <div class="layout__box">
            <div class="layout__boxHeader">
                <div class="layout__boxTitle">
                    <a href="{{route('index')}}">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            viewBox="0 0 32 32">
                            <title>arrow-left</title>
                            <path
                                d="M13.723 2.286l-13.723 13.714 13.719 13.714 1.616-1.611-10.96-10.96h27.625v-2.286h-27.625l10.965-10.965-1.616-1.607z">
                            </path>
                        </svg>
                    </a>
                    <h3>Back</h3>
                </div>
            </div>
            <div class="layout__body">
                <form class="form" action="{{route('rooms.destroy', $room->id)}}" method="POST">
             @csrf
             @method('DELETE')
                    <div class="form__group">
                        <p>Are you sure you want to delete "100 days of code"?</p>
                    </div>

                    <div class="for__group">
                        <input class="btn btn--main" type="submit" value="Confirm" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>