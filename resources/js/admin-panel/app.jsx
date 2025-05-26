import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import DashboardLayout from "./pages/dashboardLayout";
import Index from "./pages/Index";
import Pendidikan from "./pages/Pendidikan";
import Dakwah from "./pages/Dakwah";
import Kaderisasi from "./pages/Kaderisasi";
import Jamiyyah from "./pages/Jamiyyah";
import Sosial from "./pages/Sosial";

ReactDOM.createRoot(document.getElementById("app")).render(
    <BrowserRouter>
        <Routes>
            <Route path="/admin-panel" element={<DashboardLayout />}>
                <Route index element={<Index />} />
                <Route path="pendidikan" element={<Pendidikan />} />
                <Route path="dakwah" element={<Dakwah />} />
                <Route path="kaderisasi" element={<Kaderisasi />} />
                <Route path="jamiyyah" element={<Jamiyyah />} />
                <Route path="sosial" element={<Sosial />} />
            </Route>
        </Routes>
    </BrowserRouter>
);
