namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LiveSportsButton extends Component
{
    public string $urllink;

    public function __construct(string $urllink)
    {
        $this->urllink = $urllink;
    }

    public function render(): View|Closure|string
    {
        return view('components.live-sports-button');
    }
}
