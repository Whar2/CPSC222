#!/usr/bin/perl


# Open the auth.log file
open my $fh, '<', '/var/log/auth.log' or die "Could not open file '/var/log/auth.log' $!";

my $count = 0;
while (my $line = <$fh>) {
    # Increment count if line contains the string
    $count++ if $line =~ /pam_unix\(sudo:session\): session opened for user/;
}

print "$count\n";

# Close the file
close $fh;
# It worked ( ͡° ͜ʖ ͡°)

# snmpwalk -c public -v 2c localhost .1.3.6 | grep Sudo
