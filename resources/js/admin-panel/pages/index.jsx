import React from "react";
import { Grid, Card, CardContent, Typography } from "@mui/material";
import {
    School as PendidikanIcon,
    Mosque as DakwahIcon,
    Groups as KaderisasiIcon,
    VolunteerActivism as JamiyyahIcon,
    Public as SosialIcon,
} from "@mui/icons-material";

const Index = () => {
    const stats = [
        {
            name: "Pendidikan",
            value: 124,
            icon: <PendidikanIcon fontSize="large" />,
        },
        { name: "Dakwah", value: 89, icon: <DakwahIcon fontSize="large" /> },
        {
            name: "Kaderisasi",
            value: 56,
            icon: <KaderisasiIcon fontSize="large" />,
        },
        {
            name: "Jamiyyah",
            value: 203,
            icon: <JamiyyahIcon fontSize="large" />,
        },
        { name: "Sosial", value: 42, icon: <SosialIcon fontSize="large" /> },
    ];

    return (
        <div>
            <Typography variant="h4" gutterBottom>
                Selamat Datang di Dashboard Admin
            </Typography>

            <Grid container spacing={3} className="mt-4">
                {stats.map((stat) => (
                    <Grid item xs={12} sm={6} md={4} lg={2} key={stat.name}>
                        <Card className="hover:shadow-lg transition-shadow">
                            <CardContent className="text-center">
                                <div className="text-blue-600 mb-2">
                                    {stat.icon}
                                </div>
                                <Typography variant="h5" component="div">
                                    {stat.value}
                                </Typography>
                                <Typography
                                    variant="body2"
                                    color="text.secondary"
                                >
                                    {stat.name}
                                </Typography>
                            </CardContent>
                        </Card>
                    </Grid>
                ))}
            </Grid>
        </div>
    );
};

export default Index;
