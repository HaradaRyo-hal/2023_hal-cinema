import Sidebar from "./components/sidebar/Sidebar.js";
import Header from "./components/header/header.js";
import Footer from "./components/footer/footer.js";

import Home from "./components/main/toppage.jsx";
import Ticket from "./components/main/ticket.jsx";
import Movie from "./components/main/movie.jsx";
import Theater from "./components/main/theater.jsx";
import Event from "./components/main/event.jsx";
import Access from "./components/main/access.jsx";
import Support from "./components/main/support.jsx";
import Login from "./components/main/login.jsx";
import Signup from "./components/main/signup.jsx";

import { BrowserRouter, Routes, Route} from 'react-router-dom';
import './App.css';

function App() {
  return (
    <div className="App">
      <Sidebar />
      <div className="content_App">
        <div className="main_content">
          <BrowserRouter>
            <Routes>
              <Route path="/"  element={<Home />}  />
              <Route path="/ticket"  element={<Ticket />}  />
              <Route path="/movie"  element={<Movie />}  />
              <Route path="/theater"  element={<Theater />}  />
              <Route path="/event"  element={<Event />}  />
              <Route path="/access"  element={<Access />}  />
              <Route path="/support"  element={<Support />}  />
              <Route path="/login"  element={<Login />}  />
              <Route path="/signup" element={<Signup />} /> 
            </Routes>
          </BrowserRouter>
        </div>
        <Footer />
      </div>
    </div>
  );
}

export default App;
