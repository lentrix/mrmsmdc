<div class="candidate-list-item">
    <div class="candidate-pic" style="background-image:url('{{asset("images/candidates/$candidate->id.jpg")}}'); background-size: 100px">
        <span class="no-badge">{{$candidate->no}}</span>
    </div>
    <div class="candidate-details">
        <div class="candidate-name">{{$candidate->name}} - {{$candidate->level}}</div>
        <div class="candidate-team"><strong>{{$candidate->team}}</strong></div>
        <div class="score-block">
            <span>
                <label for="{{$candidate->id}}-beauty">Beauty</label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-beauty"
                        name="beauty[{{$candidate->id}}]"
                        value="{{\App\Score::get($candidate->id, auth()->user()->id, 'beauty')}}">
            </span>
            <span>
                <label for="{{$candidate->id}}-brain">Brain</label>
                <input type="number" class="score"
                        id="{{$candidate->id}}-brain"
                        name="brain[{{$candidate->id}}]"
                        value="{{\App\Score::get($candidate->id, auth()->user()->id, 'brain')}}">
            </span>
        </div>
    </div>
</div>
