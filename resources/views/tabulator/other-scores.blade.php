<div class="candidate-list-item">
    <div class="candidate-pic" style="background-image: url('{{asset("images/candidates/$candidate->id.jpg")}}'); background-size: 100px">
        <span class="no-badge">{{$candidate->no}}</span>
    </div>
    <div class="candidate-details">
        <div class="candidate-name">{{$candidate->name}} - {{$candidate->level}}</div>
        <div class="candidate-team"><strong>{{$candidate->team}}</strong></div>
        <div class="score-block">
            <span>
                <label for="{{$candidate->id}}-prof">Professionalism</label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-prof"
                        name="professionalism[{{$candidate->id}}]"
                        value="{{\App\Score::getOthers($candidate->id, 'professionalism')}}">
            </span>
            <span>
                <label for="{{$candidate->id}}-prof">Production</label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-prod"
                        name="production[{{$candidate->id}}]"
                        value="{{\App\Score::getOthers($candidate->id, 'production')}}">
            </span>
        </div>
    </div>
</div>
