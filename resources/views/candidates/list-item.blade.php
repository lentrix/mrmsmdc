<div class="candidate-list-item">
    <div class="candidate-pic" style="background-image: url('{{asset("images/candidates/$candidate->id.jpg")}}'); background-size: 100px">
        <span class="no-badge">{{$candidate->no}}</span>
    </div>
    <div class="candidate-details">
        <div class="candidate-name">{{$candidate->name}}</div>
        <div class="candidate-team"><strong>{{$candidate->team}}</strong></div>
        <div class="candidate-team">{{$candidate->level}}</div>
    </div>
</div>
