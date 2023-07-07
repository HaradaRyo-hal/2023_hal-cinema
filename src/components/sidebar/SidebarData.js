import HomeIcon from '@mui/icons-material/Home';
import ScheduleIcon from '@mui/icons-material/Event';
import MoviesIcon from '@mui/icons-material/Movie';
import TheaterIcon from '@mui/icons-material/Theaters';
import EventIcon from '@mui/icons-material/EventNote';
import AccessIcon from '@mui/icons-material/Map';
import SupportIcon from '@mui/icons-material/Help';
import LoginIcon from '@mui/icons-material/Person';

export const SidebarData = [
  {
    title: "トップページ",
    subtitle: "TOP PAGE & SCHEDULE",
    link: "/",
    icon: <HomeIcon />,
  },
  {
    title: "チケット",
    subtitle: "TICKET",
    link: '/ticket',
    icon: <ScheduleIcon />,
  },
  {
    title: "作品一覧",
    subtitle: "MOVIES",
    link: "/movie",
    icon: <MoviesIcon />,
  },
  {
    title: "劇場案内",
    subtitle: "THEATER",
    link: "/theater",
    icon: <TheaterIcon />,
  },
  {
    title: "イベント/キャンペーン",
    subtitle: "EVENT & CAMPAIGNS",
    link: "/event",
    icon: <EventIcon />,
  },
  {
    title: "アクセス",
    subtitle: "MAP & ACCESS",
    link: "/access",
    icon: <AccessIcon />,
  },
  {
    title: "サポート",
    subtitle: "SUPPORT",
    link: "/support",
    icon: <SupportIcon />,
  },
  {
    title: "ログイン",
    subtitle: "Login",
    link: "/login",
    icon: <LoginIcon/>,
  },
];