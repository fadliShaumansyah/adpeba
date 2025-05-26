import React from "react";
import Header from "../components/header";
import Sidebar from "../components/sidebar";

function App() {
    return (
        <div className="min-h-screen bg-gray-100">
            <Header />
            <main className="pt-20 px-6">
                <Sidebar />
                <h1 className="text-2xl font-bold">Beranda</h1>
            </main>
        </div>
    );
}

export default App;
